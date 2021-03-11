<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPilihanEToSoalPg extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('soal_pg', function (Blueprint $table) {
            $table->string('pilihan_e')->nullable();
            $table->string('gambar_pilihan_e')->nullable();
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
            $table->dropColumn(["pilihan_e","gambar_pilihan_e"]);
        });
    }
}
