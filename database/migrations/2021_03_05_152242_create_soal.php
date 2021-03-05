<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSoal extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('soal_pg', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('soal');
            $table->string('gambar')->nullable();
            $table->string('video')->nullable();
            $table->text('jawaban');
            $table->text('tipe_jawaban');
            $table->string('pilihan_a');
            $table->string('pilihan_b');
            $table->string('pilihan_c');
            $table->string('pilihan_d');
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
        Schema::dropIfExists('soal_pg');
    }
}
