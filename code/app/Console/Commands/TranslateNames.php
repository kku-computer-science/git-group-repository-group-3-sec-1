<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TranslateNames extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // คำสั่งในการรันใช้: php artisan translate:names
    protected $signature = 'translate:names';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Translate the first name and last name of all researchers to Chinese';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        // ดึงข้อมูลทั้งหมดจากฐานข้อมูล
        #$researchers = DB::table('users')->where('id', 51)->first();
        $researchers = DB::table('users')->get();
        #dd($researchers);
        foreach ($researchers as $researchers) {

            // ใช้ชื่อจริงและนามสกุลภาษาอังกฤษ
            $fname_en = $researchers->fname_th;
            $lname_en = $researchers->lname_th;

            // ถ้า fname_en หรือ lname_en เป็น null ให้ใช้ fname_th และ lname_th แทน
            /*
        if (is_null($fname_en) || $fname_en == '') {
            $fname_en = $researchers->fname_th; // ใช้ fname_th ถ้า fname_en ไม่มี
        }
        if (is_null($lname_en) || $lname_en == '') {
            $lname_en = $researchers->lname_th; // ใช้ lname_th ถ้า lname_en ไม่มี
        }                       
        */
            // ส่งคำขอแปลงชื่อจริงจากภาษาอังกฤษเป็นภาษาจีน
            $translateResponse = Http::withHeaders([
                'x-rapidapi-key' => '7a7dadf391msh606b86613be1755p1891b1jsn4353056adbc3', // กุญแจ API ของคุณ
                'x-rapidapi-host' => 'openl-translate.p.rapidapi.com',
            ])->post('https://openl-translate.p.rapidapi.com/translate/bulk', [
                'target_lang' => 'zh-TW',
                'text' => [
                    $fname_en,
                    $lname_en,
                ]
            ]);
            #dd($translateResponse->json());
            // ตรวจสอบว่า API ตอบกลับข้อมูลที่ถูกต้องหรือไม่
            if ($translateResponse->successful()) {
                $translatedTexts = $translateResponse->json()['translatedTexts'];

                // ถ้าฟิลด์ชื่อจริงหรือนามสกุลเป็น '-' ให้ตั้งค่าเป็น null
                if ($fname_en == '-' and $lname_en != '-') {
                    $fname_zh = null;
                    $lname_zh = $translatedTexts[1];
                } elseif ($fname_en != '-' and $lname_en == '-') {
                    $fname_zh = $translatedTexts[0];
                    $lname_zh = null;
                } elseif (($fname_en == '-' and $lname_en == '-') || ($fname_en == null and $lname_en == null)) {
                    $fname_zh = null;
                    $lname_zh = null;
                } else {
                    $fname_zh = $translatedTexts[0];
                    $lname_zh = $translatedTexts[1];
                }

                // ตรวจสอบการแปลงชื่อจีน
                if (preg_match('/\p{script=Han}+/u', $fname_zh, $matches)) {
                    $fname_zh = $matches[0]; // ใช้ชื่อจีนที่แปลแล้ว                
                }
                if (preg_match('/\p{script=Han}+/u', $lname_zh, $matches)) {
                    $lname_zh = $matches[0]; // ใช้นามสกุลจีนที่แปลแล้ว                
                }
                #dd($fname_zh, $lname_zh);

                // อัพเดตข้อมูลในฐานข้อมูลด้วยชื่อที่แปลแล้ว
                DB::table('users')->where('id', $researchers->id)->update([
                    'fname_zh' => $fname_zh,
                    'lname_zh' => $lname_zh,
                ]);

                // แสดงผลการแปล
                $this->info("Name for researcher {$researchers->id} translated to Chinese: $fname_zh $lname_zh");
            } else {
                $this->error("Error: Unable to translate names for researcher {$researchers->id}");
            }
        }
        
    }
}
