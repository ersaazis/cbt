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
		
        $this->addText('Soal PG','id')->indexDisplayTransform(function($mapel_id) {
            $soalA=SoalPg::where('mapel_id',$mapel_id)->where('paket_ujian_id',1)->count();
            $soalB=SoalPg::where('mapel_id',$mapel_id)->where('paket_ujian_id',2)->count();
            $soalC=SoalPg::where('mapel_id',$mapel_id)->where('paket_ujian_id',3)->count();
            return "
            Paket A : $soalA <br>
            Paket B : $soalB <br>
            Paket C : $soalC <br>
            ";
        })->detailDisplayTransform(function($mapel_id) {
            $soalA=SoalPg::where('mapel_id',$mapel_id)->where('paket_ujian_id',1)->count();
            $soalB=SoalPg::where('mapel_id',$mapel_id)->where('paket_ujian_id',2)->count();
            $soalC=SoalPg::where('mapel_id',$mapel_id)->where('paket_ujian_id',3)->count();
            return "
            Paket A : $soalA <br>
            Paket B : $soalB <br>
            Paket C : $soalC <br>
            ";
        })->showEdit(false)->showAdd(false)->defaultValue(null);

        $this->addText('Soal Essai','id')->indexDisplayTransform(function($mapel_id) {
            $soalA=SoalEssai::where('mapel_id',$mapel_id)->where('paket_ujian_id',1)->count();
            $soalB=SoalEssai::where('mapel_id',$mapel_id)->where('paket_ujian_id',2)->count();
            $soalC=SoalEssai::where('mapel_id',$mapel_id)->where('paket_ujian_id',3)->count();
            return "
            Paket A : $soalA <br>
            Paket B : $soalB <br>
            Paket C : $soalC <br>
            ";
        })->detailDisplayTransform(function($mapel_id) {
            $soalA=SoalEssai::where('mapel_id',$mapel_id)->where('paket_ujian_id',1)->count();
            $soalB=SoalEssai::where('mapel_id',$mapel_id)->where('paket_ujian_id',2)->count();
            $soalC=SoalEssai::where('mapel_id',$mapel_id)->where('paket_ujian_id',3)->count();
            return "
            Paket A : $soalA <br>
            Paket B : $soalB <br>
            Paket C : $soalC <br>
            ";
        })->showEdit(false)->showAdd(false)->defaultValue(null);

        $this->addSubModule("Pilihan Ganda", AdminSoalPgController::class, "mapel_id", function ($row) {
            return [
              "ID"=> $row->primary_key,
              "Nama"=> $row->nama
            ];
        });

        $this->addSubModule("Essai", AdminSoalEssaiController::class, "mapel_id", function ($row) {
            return [
              "ID"=> $row->primary_key,
              "Nama"=> $row->nama
            ];
        });
    }
}
