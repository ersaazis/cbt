<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdateJadwalUjian extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('jadwal_ujian', function (Blueprint $table) {
            $table->dropForeign('jadwal_ujian_mapel_id_foreign');
            $table->dropForeign('jadwal_ujian_paket_ujian_id_foreign');
            $table->dropUnique('jadwal_ujian_mapel_id_unique');
            $table->dropUnique('jadwal_ujian_paket_ujian_id_unique');
            $table->foreign('mapel_id')->references('id')->on('mapel')->onDelete('cascade');
            $table->foreign('paket_ujian_id')->references('id')->on('paket_ujian')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
