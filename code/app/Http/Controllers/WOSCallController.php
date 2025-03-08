<?php
namespace App\Http\Controllers;
use App\Models\Author;
use App\Models\User;
use App\Models\Paper;
use App\Models\Source_data;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class WOSCallController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('WOS_API_KEY');
    }

    public function createWOS($id)
    {
        set_time_limit(120);  // เพิ่มเวลาในการประมวลผลเป็น 120 วินาที (2 นาที)
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);

        try {
            // Step 1: ค้นหางานวิจัยจากชื่อผู้แต่ง
            $authorQuery = $this->formatAuthorQuery($user);
            $response = $this->fetchWOSData($authorQuery);
            
            if (empty($response['hits'])) {
                return redirect()->back()->with('error', 'ไม่พบข้อมูลใน Web of Science');
            }

            // Step 2: บันทึกข้อมูล
            foreach ($response['hits'] as $hit) {
                $this->saveWOSData($hit, $user->id);
            }

            return redirect()->back()->with('success', 'ดึงข้อมูล WOS เรียบร้อยแล้ว');

        } catch (\Exception $e) {
            Log::error('WOS Error: '.$e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }

    private function formatAuthorQuery(User $user)
    {
        $firstNameInitial = substr($user->fname_en, 0, 1);
        return "AU={$user->lname_en}, {$firstNameInitial}";
    }

    private function fetchWOSData($authorQuery)
    {
        if ($this->apiKey == null) {
            return response()->json(['error' => 'API Key not found'], 404);
        }
        return Http::withHeaders(['X-ApiKey' => $this->apiKey])
            ->get('https://api.clarivate.com/apis/wos-starter/v1/documents', [
                'db' => 'WOS',
                'q' => $authorQuery,
                'limit' => 50
            ])->json();
    }

    private function saveWOSData($hit, $userId)
    {
        $paperData = [
            'title' => $hit['title'] ?? 'N/A',
            'publication' => $hit['source']['sourceTitle'] ?? 'N/A',
            'paper_yearpub' => $hit['source']['publishYear'] ?? null,
            'paper_page' => $hit['source']['pages']['range'] ?? null,
            'url_title' => $hit['links']['record'] ?? null,
            'doi' => $this->getStringValue($hit['identifiers']['doi'] ?? null),
            'authors' => $this->processWOSAuthors($hit['names']['authors'] ?? []),
            'paper_type' => $this->getStringValue($hit['sourceTypes'] ?? null)            
        ];

        $paper = Paper::firstOrCreate(
            ['paper_doi' => $paperData['doi']],
            [
                'paper_name' => $paperData['title'],
                'paper_type' => $paperData['paper_type'],
                'paper_subtype' => null,
                'paper_sourcetitle' => $paperData['publication'],
                'paper_url' => $paperData['url_title'],
                'paper_yearpub' => $paperData['paper_yearpub'],
                'paper_volume' => $this->extractVolumeIssue($paperData['publication'])['volume'],
                'paper_issue' => $this->extractVolumeIssue($paperData['publication'])['issue'],
                'paper_page' => $paperData['paper_page'],                
                'abstract' => null
            ]
        );

        // ผูกผู้ใช้ปัจจุบัน
        $paper->teacher()->syncWithoutDetaching([$userId => ['author_type' => 1]]);
        
        // ผูกแหล่งข้อมูล
        $source = Source_data::firstOrCreate(['source_name' => 'Web of Science']);
        $paper->source()->sync($source->id);

        // จัดการผู้แต่ง
        $this->processAuthors($paper, $paperData['authors'], $userId);
    }

    private function processWOSAuthors($authors)
    {
        return collect($authors)->map(function ($author) {
            $nameParts = explode(', ', $author['displayName']);
            $lastName = $nameParts[0];
            $firstName = count($nameParts) > 1 ? $nameParts[1] : '';
            return trim("{$firstName} {$lastName}");
        })->join(', ');
    }
    
    private function extractVolumeIssue($publication)
    {
        $volume = null;
        $issue = null;

        // ใช้ regex เพื่อดึงค่า Volume และ Issue
        if (preg_match('/(\d+)\s*\((\d+)\)/', $publication, $matches)) {
            $volume = isset($matches[1]) ? $matches[1] : null;  // Volume
            $issue = isset($matches[2]) ? $matches[2] : null;  // Issue
        }

        return [
            'volume' => $volume,
            'issue' => $issue
        ];
    }

    private function processAuthors($paper, $authorsString, $userId)
    {
        $authors = explode(',', $authorsString);
        $totalAuthors = count($authors);

        // 1. ผูกผู้ใช้ปัจจุบันกับบทความเสมอ
        $paper->teacher()->syncWithoutDetaching([$userId => ['author_type' => 1]]);

        foreach ($authors as $index => $authorName) {
            $authorType = $this->determineAuthorType($index, $totalAuthors);
            $authorName = trim($authorName);

            // 2. แยกชื่อและนามสกุล
            $nameParts = explode(' ', $authorName);
            $firstName = count($nameParts) > 1 ? implode(' ', array_slice($nameParts, 0, -1)) : '';
            $lastName = count($nameParts) > 1 ? end($nameParts) : $authorName;

            // 3. ค้นหาผู้ใช้จากชื่อเต็มหรือนามสกุล
            $user = User::where(function ($query) use ($authorName, $lastName) {
                $query->where(DB::raw("CONCAT(fname_en, ' ', lname_en)"), $authorName)
                    ->orWhere(DB::raw("CONCAT(fname_th, ' ', lname_th)"), $authorName)
                    ->orWhere('lname_en', $lastName)
                    ->orWhere('lname_th', $lastName);
            })->first();

            if ($user) {
                $paper->teacher()->syncWithoutDetaching([$user->id => ['author_type' => $authorType]]);
            } else {
                $author = Author::firstOrCreate([
                    'author_fname' => $firstName,
                    'author_lname' => $lastName
                ]);
                $paper->author()->syncWithoutDetaching([$author->id => ['author_type' => $authorType]]);
            }
        }
    }


    private function determineAuthorType($index, $total)
    {
        return match(true) {
            $index === 0 => 1,
            $index === $total - 1 => 3,
            default => 2
        };
    }

    private function getStringValue($value)
{
    if (is_array($value)) {
        return implode(', ', $value); // แปลง array เป็น string
    }
    return $value ?? null;
}
}