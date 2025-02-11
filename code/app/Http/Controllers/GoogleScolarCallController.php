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

class GoogleScolarCallController extends Controller
{
    private $apiKey;

    public function __construct()
    {
        $this->apiKey = env('GOOGLE_SCHOLAR_API_KEY');
    }

    public function createScholar($id)
    {
        $id = Crypt::decrypt($id);
        $user = User::findOrFail($id);

        try {
            // Step 1: ค้นหาผู้เขียนจากชื่อ
            $authorData = $this->fetchAuthorData($user);
            if (empty($authorData['author_id'])) {
                return redirect()->back()->with('error', 'ไม่พบข้อมูลผู้เขียนใน Google Scholar');
            }

            // Step 2: ดึงรายการบทความ
            $articles = $this->fetchArticles($authorData['author_id']);
            if (empty($articles)) {
                return redirect()->back()->with('error', 'ไม่พบบทความของผู้เขียน');
            }

            // Step 3: ดึงรายละเอียดบทความและบันทึกข้อมูล
            foreach ($articles as $article) {
                $citationDetails = $this->fetchCitationDetails($article['citation_id']);
                $this->saveScholarData($article, $citationDetails, $user->id);
            }

            return redirect()->back()->with('success', 'ดึงข้อมูล Google Scholar เรียบร้อยแล้ว');
        } catch (\Exception $e) {
            Log::error('Google Scholar Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    }

    private function fetchAuthorData(User $user)
    {
        $searchName = $user->fname_en . ' ' . $user->lname_en;
        $response = Http::get('https://serpapi.com/search', [
            'mauthors' => $searchName,
            'engine' => 'google_scholar_profiles',
            'api_key' => $this->apiKey
        ]);

        return $response->json()['profiles'][0] ?? [];
    }

    private function fetchArticles($authorId)
    {
        $response = Http::get('https://serpapi.com/search', [
            'author_id' => $authorId,
            'engine' => 'google_scholar_author',
            'api_key' => $this->apiKey
        ]);

        return $response->json()['articles'] ?? [];
    }

    private function fetchCitationDetails($citationId)
    {
        $response = Http::get('https://serpapi.com/search.json', [
            'engine' => 'google_scholar_author',
            'view_op' => 'view_citation',
            'citation_id' => $citationId,
            'api_key' => $this->apiKey
        ]);

        return $response->json()['citation'] ?? [];
    }

    private function saveScholarData($article, $citationDetails, $userId)
    {
        // ดึงข้อมูลจากทั้ง 3 API
        $paperData = [
            'title' => $article['title'],
            'url_title' => $article['link'],
            'publication' => $this->extractPublication($article['publication']),
            'paper_volume' => $this->extractVolumeIssue($article['publication'])['volume'],
            'paper_issue' => $this->extractVolumeIssue($article['publication'])['issue'],
            'paper_type' => $this->determinePaperType($article['publication']),
            'paper_yearpub' => $article['year'],
            'paper_citation' => $article['cited_by']['value'] ?? 0,
            'paper_page' => $citationDetails['pages'] ?? null,
            'abstract' => $citationDetails['description'] ?? null,
            'conference' => $citationDetails['conference'] ?? null,
            'authors' => $this->cleanAuthors($citationDetails['authors'] ?? $article['authors'])
        ];

        // บันทึกข้อมูล Paper        
        /*
        $paper = Paper::firstOrCreate(
            ['paper_name' => $paperData['title']],
            [
                'paper_type' => null,
                'paper_subtype' => null,
                'paper_sourcetitle' => $paperData['publication'],
                'paper_url' => $paperData['url_title'],
                'paper_yearpub' => $paperData['paper_yearpub'],
                'paper_volume' => $paperData['paper_volume'],
                'paper_issue' => $paperData['paper_issue'],
                'paper_citation' => $paperData['paper_citation'],
                'paper_page' => $paperData['paper_page'],
                'paper_doi' => null,
                'abstract' => $paperData['abstract']
            ]
        );
        */
        // กำหนดให้เปรียบเทียบ title โดยไม่สนอักขระตัวพิมพ์เล็ก-ใหญ่
        $existingPaper = Paper::whereRaw('LOWER(paper_name) = ?', [strtolower($paperData['title'])])->first();

        // ถ้าเจอว่า `paper_name` มีอยู่แล้วในฐานข้อมูล
        if ($existingPaper) {
            // ใช้ title ของข้อมูลที่มีอยู่แล้ว
            $paper = $existingPaper;
        } else {
            // ถ้าไม่พบ ก็สร้างแถวใหม่
            $paper = Paper::create([
                'paper_name' => $paperData['title'],
                'paper_type' =>  null,
                'paper_subtype' => null,
                'paper_sourcetitle' => $paperData['publication'],
                'paper_url' => $paperData['url_title'],
                'paper_yearpub' => $paperData['paper_yearpub'],
                'paper_volume' => $paperData['paper_volume'],
                'paper_issue' => $paperData['paper_issue'],
                'paper_citation' => $paperData['paper_citation'],
                'paper_page' => $paperData['paper_page'],
                'paper_doi' => null,
                'abstract' => $paperData['abstract']
            ]);
        }

        $paper->teacher()->syncWithoutDetaching([$userId => ['author_type' => 1]]);

        // ผูกกับแหล่งข้อมูล
        $source = Source_data::firstOrCreate(['source_name' => 'Google Scholar']);
        $paper->source()->sync($source->id);

        // จัดการผู้แต่ง
        $this->processAuthors($paper, $paperData['authors'], $userId);
    }

    private function extractPublication($publicationText)
    {
        preg_match('/^(.*?)(\d+)\s*\((\d+)\)/', $publicationText, $matches);
        return trim($matches[1] ?? $publicationText);
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

    private function cleanAuthors($authorsText)
    {
        return collect(explode(',', $authorsText))
            ->map(fn($author) => preg_replace('/\d+/', '', trim($author)))
            ->filter()
            ->join(', ');
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
        return match (true) {
            $index === 0 => 1,
            $index === $total - 1 => 3,
            default => 2
        };
    }

    function determinePaperType($paper_sourcetitle)
    {
        $paper_type = null; // ค่าเริ่มต้น ถ้าไม่พบเงื่อนไข

        if (stripos($paper_sourcetitle, 'journal') !== false) {
            $paper_type = "Journal";
        } elseif (stripos($paper_sourcetitle, 'conference') !== false) {
            $paper_type = "Conference Paper";
        }

        return $paper_type;
    }
    
}
