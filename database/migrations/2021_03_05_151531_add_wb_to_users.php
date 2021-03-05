<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddWbToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nisn')->nullable()->unique();
            $table->unsignedBigInteger('lembaga_pkbm_id')->nullable();
            $table->foreign('lembaga_pkbm_id')->references('id')->on('lembaga_pkbm')->onDelete('cascade');
            $table->unsignedBigInteger('paket_ujian_id')->nullable();
            $table->foreign('paket_ujian_id')->references('id')->on('paket_ujian')->onDelete('cascade');
            $table->string('tipe')->default('wb');
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
            $table->dropForeign('users_lembaga_pkbm_id_foreign');
            $table->dropForeign('users_paket_ujian_id_foreign');
            $table->dropColumn(["lembaga_pkbm_id","paket_ujian_id","tipe"]);
        });
    }
}
