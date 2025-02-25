<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddLanguageColumnsToProgramsTable extends Migration
{
    /**
     * Run the migrations.
     * รันคำสั่งโดยใช้ php artisan migrate --path=database/migrations/2025_02_22_013436_add_language_columns_to_programs_table.php
     * @return void
     */
    public function up()
    {
        Schema::table('programs', function (Blueprint $table) {
            // Add new columns
            $table->string('program_name_zh')->after('program_name_en');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('programs', function (Blueprint $table) {
            //
            $table->dropColumn('program_name_zh');
        });
    }
}
