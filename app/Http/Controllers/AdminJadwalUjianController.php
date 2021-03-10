<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminJadwalUjianController extends CBController {


    public function cbInit()
    {
        $this->setTable("jadwal_ujian");
        $this->setPermalink("jadwal_ujian");
        $this->setPageTitle("Jadwal Ujian");

        $this->addSelectTable("Mapel","mapel_id",["table"=>"mapel","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);
		$this->addSelectTable("Paket Ujian","paket_ujian_id",["table"=>"paket_ujian","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);
		$this->addDatetime("Tanggal","tanggal")->filterable(true)->format('Y-m-d H:i:s');
		
        $this->setBeforeIndexTable('
        <div class="alert bg-navy" role="alert"><i class="glyphicon glyphicon-warning-sign"></i> Keterlambatan Login Maximal 60 menit dari jadwal</div>
        ');
    }
}
