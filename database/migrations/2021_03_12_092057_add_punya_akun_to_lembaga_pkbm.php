<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddPunyaAkunToLembagaPkbm extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('lembaga_pkbm', function (Blueprint $table) {
            $table->boolean('punya_akun')->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('lembaga_pkbm', function (Blueprint $table) {
            $table->dropColumn(["punya_akun"]);
        });
    }
}
