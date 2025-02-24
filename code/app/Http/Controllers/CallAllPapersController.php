<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Log;

class CallAllPapersController extends Controller
{
    protected $scopusController;
    protected $tciController;
    protected $googleScholarController;
    protected $wosController;

    public function __construct(
        ScopuscallController $scopusController,        
        GoogleScolarCallController $googleScholarController,
        WOSCallController $wosController
    ) {
        $this->scopusController = $scopusController;        
        $this->googleScholarController = $googleScholarController;
        $this->wosController = $wosController;
    }

    public function callAllPapers($id)
    {
        try {
            #$id = Crypt::decrypt($id);

            // เรียก Scopus API และดักจับข้อผิดพลาด
            try {
                $this->scopusController->create($id);
            } catch (\Exception $e) {
                Log::error('Scopus API Error: ' . $e->getMessage());
            }            

            // เรียก Google Scholar API และดักจับข้อผิดพลาด
            try {
                $this->googleScholarController->createScholar($id);
            } catch (\Exception $e) {
                Log::error('Google Scholar API Error: ' . $e->getMessage());
            }

            // เรียก Web of Science API และดักจับข้อผิดพลาด
            try {
                $this->wosController->createWOS($id);
            } catch (\Exception $e) {
                Log::error('Web of Science API Error: ' . $e->getMessage());
            }

            return redirect()->back()->with('success', 'ดึงข้อมูลจากทุกแหล่งเรียบร้อยแล้ว');
        } catch (\Exception $e) {
            Log::error('Call All Papers Error: ' . $e->getMessage());
            return redirect()->back()->with('error', 'เกิดข้อผิดพลาดในการดึงข้อมูล');
        }
    } 

}