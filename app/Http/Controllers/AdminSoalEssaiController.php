<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminSoalEssaiController extends CBController {


    public function cbInit()
    {
        $this->setTable("soal_essai");
        $this->setPermalink("soal_essai");
        $this->setPageTitle("Soal Essai");

        $this->addWysiwyg("Soal","soal");
		$this->addImage("Gambar","gambar")->required(false)->encrypt(true);
		$this->addText("Video","video")->required(false)->strLimit(150)->maxLength(255);
		$this->addSelectTable("Mata Pelajaran","mapel_id",["table"=>"mapel","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);
		$this->addSelectTable("Paket Ujian","paket_ujian_id",["table"=>"paket_ujian","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);

    }
}
