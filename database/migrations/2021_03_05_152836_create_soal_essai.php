<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoalEssai extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_essai', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('soal');
            $table->string('gambar')->nullable();
            $table->string('video')->nullable();
            $table->unsignedBigInteger('paket_ujian_id')->nullable();
            $table->foreign('paket_ujian_id')->references('id')->on('paket_ujian')->onDelete('cascade');
            $table->unsignedBigInteger('mapel_id')->nullable();
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
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
        Schema::dropIfExists('soal_essai');
    }
}
