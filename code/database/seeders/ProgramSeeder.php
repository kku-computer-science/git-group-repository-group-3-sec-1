<?php
namespace Database\Seeders;

use App\Models\Program;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProgramSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        /*
        Program::create([
            'program_name_th' => 'สาขาวิชาวิทยาการคอมพิวเตอร์',
            'program_name_en' => 'Computer Science',
            'program_name_zh' => '计算机科学',
            'degree_id ' => 1,
            'department_id' => 1
        ]);               
        Program::create([
            'program_name_th' => 'สาขาวิชาเทคโนโลยีสารสนเทศ',
            'program_name_en' => 'Information Technology',
            'program_name_zh' => '信息技术',
            'degree_id ' => 1,
            'department_id' => 1
        ]);
        Program::create([
            'program_name_th' => 'สาขาวิชาภูมิสารสนเทศศาสตร์ ',
            'program_name_en' => 'Geo-Informatics',
            'program_name_zh' => '地理信息学',
            'degree_id ' => 1,
            'department_id' => 1
        ]);
        Program::create([
            'program_name_th' => 'สาขาวิชาวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ',
            'program_name_en' => 'Computer Science and Infomation Technology',
            'program_name_zh' => '计算机科学与信息技术',
            'degree_id ' => 2,
            'department_id' => 1
        ]);
        Program::create([
            'program_name_th' => 'สาขาวิชาวิทยาการข้อมูลและปัญญาประดิษฐ์ หลักสูตรนานาชาติ',
            'program_name_en' => 'Data Science and Artificial Intelligence (International Program)',
            'program_name_zh' => '数据科学与人工智能（国际课程）',
            'degree_id ' => 2,
            'department_id' => 1
        ]);
        Program::create([
            'program_name_th' => 'สาขาวิชาภูมิสารสนเทศศาสตร์',
            'program_name_en' => 'Geo-Informatics',
            'program_name_zh' => '地理信息学',
            'degree_id ' => 2,
            'department_id' => 1
        ]);
        Program::create([
            'program_name_th' => 'สาขาวิชาวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ หลักสูตรนานาชาติ',
            'program_name_en' => 'Computer Science and Infomation Technology (International Program)',
            'program_name_zh' => '计算机科学与信息技术（国际课程）',
            'degree_id ' => 3,
            'department_id' => 1
        ]);
        Program::create([
            'program_name_th' => 'สาขาวิชาภูมิสารสนเทศศาสตร์',
            'program_name_en' => 'Geo-Informatics',
            'program_name_zh' => '地理信息学',
            'degree_id ' => 3,
            'department_id' => 1
        ]);
        */

        $programs = [
            [
                'id' => 1,
                'program_name_th' => 'สาขาวิชาวิทยาการคอมพิวเตอร์',
                'program_name_en' => 'Computer Science',
                'program_name_zh' => '计算机科学'
                #'degree_id ' => 1,
                #'department_id' => 1
            ],
            [
                'id' => 2,
                'program_name_th' => 'สาขาวิชาเทคโนโลยีสารสนเทศ',
                'program_name_en' => 'Information Technology',
                'program_name_zh' => '信息技术'
                #'degree_id ' => 1,
                #'department_id' => 1
            ],
            [
                'id' => 3,
                'program_name_th' => 'สาขาวิชาภูมิสารสนเทศศาสตร์ ',
                'program_name_en' => 'Geo-Informatics',
                'program_name_zh' => '地理信息学'
                #'degree_id ' => 1,
                #'department_id' => 1
            ],
            [
                'id' => 4,
                'program_name_th' => 'สาขาวิชาวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ',
                'program_name_en' => 'Computer Science and Infomation Technology',
                'program_name_zh' => '计算机科学与信息技术'
                #'degree_id ' => 2,
                #'department_id' => 1
            ],
            [
                'id' => 5,
                'program_name_th' => 'สาขาวิชาวิทยาการข้อมูลและปัญญาประดิษฐ์ หลักสูตรนานาชาติ',
                'program_name_en' => 'Data Science and Artificial Intelligence (International Program)',
                'program_name_zh' => '数据科学与人工智能（国际课程)'
                #'degree_id ' => 2,
                #'department_id' => 1
            ],
            [
                'id' => 6,
                'program_name_th' => 'สาขาวิชาภูมิสารสนเทศศาสตร์',
                'program_name_en' => 'Geo-Informatics',
                'program_name_zh' => '地理信息学'
                #'degree_id ' => 2,
                #'department_id' => 1
            ],
            [
                'id' => 24,
                'program_name_th' => 'สาขาวิชาวิทยาการคอมพิวเตอร์และเทคโนโลยีสารสนเทศ หลักสูตรนานาชาติ',
                'program_name_en' => 'Computer Science and Infomation Technology (International Program)',
                'program_name_zh' => '计算机科学与信息技术（国际课程)'
                #'degree_id ' => 3,
                #'department_id' => 1
            ],
            [
                'id' => 25,
                'program_name_th' => 'สาขาวิชาภูมิสารสนเทศศาสตร์',
                'program_name_en' => 'Geo-Informatics',
                'program_name_zh' => '地理信息学'
                #'degree_id ' => 3,
                #'department_id' => 1
            ]       

        ];

        foreach ($programs as $program) {
            DB::table('programs')->updateOrInsert(
                [
                    'id' => $program['id']
                ],
                [                    
                    'program_name_zh' => $program['program_name_zh']                    
                ]
            );
        }
    }
}