<?php namespace App\Http\Controllers;

use App\User;
use ersaazis\cb\controllers\CBController;

class AdminLembagaPKBMController extends CBController {


    public function cbInit()
    {
        $this->setTable("lembaga_pkbm");
        $this->setPermalink("lembaga_pkbm");
        $this->setPageTitle("Lembaga PKBM");
        $this->addText("PKBM","pkbm")->strLimit(150)->maxLength(255);
		$this->addText("NPSN","npsn")->strLimit(150)->maxLength(255);
		
        $this->addSubModule("Warga Belajar", AdminWargaBelajarController::class, "lembaga_pkbm_id", function ($row) {
            return [
              "ID"=> $row->primary_key,
              "Nama PKBM "=> $row->pkbm
            ];
        });
        $this->addText('Warga Belajar','id')->indexDisplayTransform(function($id) {
            $soal=User::where('lembaga_pkbm_id',$id)->where('cb_roles_id',2)->count();
            return $soal;
        })->detailDisplayTransform(function($id) {
            $soal=User::where('lembaga_pkbm_id',$id)->where('cb_roles_id',2)->count();
            return $soal;
        })->showEdit(false)->showAdd(false)->defaultValue(null);

    }
}
