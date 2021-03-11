<?php namespace App\Http\Controllers;

use App\SoalEssai;
use App\SoalPg;
use ersaazis\cb\controllers\CBController;

class AdminMataPelajaranController extends CBController {


    public function cbInit()
    {
        $this->setTable("mapel");
        $this->setPermalink("mata_pelajaran");
        $this->setPageTitle("Mata Pelajaran");

        $this->addText("Nama","nama")->strLimit(150)->maxLength(255);
		$this->addSelectOption("Jurusan","jurusan")->options(['IPA'=>'IPA','IPS'=>'IPS',null=>'Tidak Ada']);
		
        $this->addCustom('Soal PG','primary_key')->indexDisplayTransform(function($mapel_id) {
            $soal=SoalPg::where('mapel_id',$mapel_id)->count();
            return $soal;
        })->detailDisplayTransform(function($mapel_id) {
            $soal=SoalPg::where('mapel_id',$mapel_id)->count();
            return $soal;
        })->showEdit(false)->showAdd(false);

        $this->addCustom('Soal Essai','primary_key')->indexDisplayTransform(function($mapel_id) {
            $soal=SoalEssai::where('mapel_id',$mapel_id)->count();
            return $soal;
        })->detailDisplayTransform(function($mapel_id) {
            $soal=SoalEssai::where('mapel_id',$mapel_id)->count();
            return $soal;
        })->showEdit(false)->showAdd(false);

    }
}
