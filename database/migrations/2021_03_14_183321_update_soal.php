<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateSoal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soal_pg', function (Blueprint $table) {
            $table->text('soal')->change();
        });
        Schema::table('soal_essai', function (Blueprint $table) {
            $table->text('soal')->change();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('soal_pg', function (Blueprint $table) {
            $table->dropColumn(["soal"]);
        });
        Schema::table('soal_essai', function (Blueprint $table) {
            $table->dropColumn(["soal"]);
        });
    }
}
