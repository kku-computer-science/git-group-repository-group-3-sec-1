<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguageColumnsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     * รันคำสั่งโดยใช้ php artisan migrate --path=database/migrations/2025_02_23_182904_add_language_columns_to_users_table.php

     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            
            $table->string('fname_zh')->after('lname_th')->nullable();
            $table->string('lname_zh')->after('fname_zh')->nullable();
            $table->string('academic_ranks_zh')->after('academic_ranks_th')->nullable();
            $table->string('position_zh')->after('position_th')->nullable();
            $table->string('title_name_zh')->after('title_name_en')->nullable();
            $table->string('doctoral_degree_zh')->after('doctoral_degree')->nullable();
            $table->string('doctoral_degree_th')->after('doctoral_degree_zh')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            
            $table->dropColumn('fname_zh');
            $table->dropColumn('lname_zh');
            $table->dropColumn('academic_ranks_zh');
            $table->dropColumn('position_zh');
            $table->dropColumn('title_name_zh'); 
            $table->dropColumn('doctoral_degree_zh');
            $table->dropColumn('doctoral_degree_th');

        });
    }
}
