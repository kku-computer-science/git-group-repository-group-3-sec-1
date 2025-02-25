<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class TranslateAdditionalUserInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    // ใช้คำสั่ง php artisan translate:additional-user-info
    protected $signature = 'translate:additional-user-info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

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
     * @return int
     */
    public function handle()
    {
        // ดึงข้อมูลจากฐานข้อมูล
        #$researchers = DB::table('users')->where('id', 51)->first();
        $researchers = DB::table('users')->get();
        #dd($researchers);
        foreach ($researchers as $researchers) {
            // กำหนดค่า academic rank, position และ title name หรือ null หากเป็น null หรือค่าว่าง
            $academic_rank_en = !empty($researchers->academic_ranks_en) ? $researchers->academic_ranks_en : null;
            $position_en = !empty($researchers->position_en) ? $researchers->position_en : null;
            $title_name_en = !empty($researchers->title_name_en) ? $researchers->title_name_en : null;

            // สร้าง array ที่เก็บคู่ของข้อมูลและชื่อฟิลด์
            $fieldsToTranslate = [
                'academic_ranks' => $academic_rank_en,
                'position' => $position_en,
                'title_name' => $title_name_en
            ];

            // กรองเฉพาะข้อมูลที่ไม่เป็น null
            $validFields = array_filter($fieldsToTranslate, function ($value) {
                return !is_null($value);
            });
            #dd($textToTranslate);
            // ถ้ามีข้อมูลที่ต้องแปล
            if (!empty($validFields)) {
                $translateResponse = Http::withHeaders([
                    'x-rapidapi-key' => '7a7dadf391msh606b86613be1755p1891b1jsn4353056adbc3', // กุญแจ API ของคุณ
                    'x-rapidapi-host' => 'openl-translate.p.rapidapi.com',
                ])->post('https://openl-translate.p.rapidapi.com/translate/bulk', [
                    'target_lang' => 'zh-TW',
                    'text' => array_values($validFields),
                ]);

                // ตรวจสอบว่า API ส่ง response ที่สำเร็จ
                if ($translateResponse->successful()) {
                    $responseData = $translateResponse->json();

                    // ตรวจสอบ key 'translatedTexts'
                    if (isset($responseData['translatedTexts']) && is_array($responseData['translatedTexts'])) {
                        $translatedTexts = $responseData['translatedTexts'];

                        // สร้าง array เก็บผลลัพธ์การแปล
                        $translatedData = [];
                        $index = 0;

                        // วนลูปเฉพาะฟิลด์ที่ไม่เป็น null
                        foreach ($validFields as $field => $value) {
                            if (isset($translatedTexts[$index])) {
                                $translatedText = $translatedTexts[$index];
                                // ตรวจสอบว่ามีตัวอักษรจีนหรือไม่
                                if (preg_match('/\p{script=Han}+/u', $translatedText, $matches)) {
                                    $translatedData[$field . '_zh'] = $matches[0];
                                } else {
                                    $translatedData[$field . '_zh'] = $translatedText;
                                }
                            }
                            $index++;
                        }
                        // อัพเดตฐานข้อมูลด้วยข้อมูลที่แปลแล้ว
                        $updateData = [
                            'academic_ranks_zh' => $translatedData['academic_ranks_zh'] ?? null,
                            'position_zh' => $translatedData['position_zh'] ?? null,
                            'title_name_zh' => $translatedData['title_name_zh'] ?? null
                        ];
                        dd($updateData);

                        DB::table('users')->where('id', $researchers->id)->update($updateData);

                        // แสดงผลการแปล
                        $this->info("Additional info translated to Chinese:");
                        foreach ($updateData as $field => $value) {
                            $this->info("$field: " . ($value ?? 'null'));
                        }
                    } else {
                        // ถ้าไม่พบ translatedTexts ใน API response
                        $this->error("Error: 'translatedTexts' not found in the API response.");
                    }
                } else {
                    // ถ้า API response ไม่สำเร็จ
                    $this->error("Error: Unable to translate additional info for researcher {$researchers->id}. API response failed.");
                }
            } else {
                $this->info("No valid data to translate for researcher {$researchers->id}.");
            }
        }
    }
}
