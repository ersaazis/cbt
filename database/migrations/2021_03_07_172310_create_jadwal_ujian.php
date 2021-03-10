<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateJadwalUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('jadwal_ujian', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('mapel_id')->unique();
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
            $table->unsignedBigInteger('paket_ujian_id')->unique();
            $table->foreign('paket_ujian_id')->references('id')->on('paket_ujian')->onDelete('cascade');
            $table->dateTime('tanggal');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('jadwal_ujian');
    }
}
