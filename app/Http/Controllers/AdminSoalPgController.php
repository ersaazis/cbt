<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminSoalPgController extends CBController {


    public function cbInit()
    {
        $this->setTable("soal_pg");
        $this->setPermalink("soal_pg");
        $this->setPageTitle("Soal Pg");

        $this->addText("Soal","soal")->strLimit(150)->maxLength(255);
		$this->addImage("Gambar","gambar")->required(false)->encrypt(true);
		$this->addText("Video","video")->required(false)->strLimit(150)->maxLength(255);
		$this->addSelectOption("Jawaban","jawaban")->options(['A'=>'A','B'=>'B','C'=>'C','D'=>'D']);
		$this->addRadio("Tipe Jawaban","tipe_jawaban")->options(['text'=>'Text','gambar'=>'Gambar']);
		$this->addText("Pilihan A","pilihan_a")->strLimit(150)->maxLength(255);
		$this->addText("Pilihan B","pilihan_b")->strLimit(150)->maxLength(255);
		$this->addImage("Pilihan C","pilihan_c")->encrypt(true);
		$this->addImage("Pilihan D","pilihan_d")->encrypt(true);
		$this->addSelectTable("Mata Pelajaran","mapel_id",["table"=>"mapel","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);
		$this->addSelectTable("Paket Ujian","paket_ujian_id",["table"=>"paket_ujian","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);

    }
}
