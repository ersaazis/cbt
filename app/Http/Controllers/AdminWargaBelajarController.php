<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;
use Illuminate\Support\Facades\Hash;

class AdminWargaBelajarController extends CBController {


    public function cbInit()
    {
        $this->setTable("users");
        $this->setPermalink("warga_belajar");
        $this->setPageTitle("Warga Belajar");

        $this->addText("Name","name")->strLimit(150)->maxLength(255);
		$this->addText("Nisn","nisn")->strLimit(150)->maxLength(255);
		$this->addSelectTable("Paket Ujian","paket_ujian_id",["table"=>"paket_ujian","value_option"=>"id","display_option"=>"nama","sql_condition"=>""]);
		$this->addSelectOption("Jurusan","jurusan")->options(['IPA'=>'IPA','IPS'=>'IPS',null=>'Tidak Ada']);

        $this->hookBeforeUpdate(function($data, $id) {
            $data['password'] = Hash::make('ersaazis');
            $data['cb_roles_id'] = 2;
            return $data;
        });
        $this->hookBeforeInsert(function($data) {
            $data['password'] = Hash::make('ersaazis');
            $data['cb_roles_id'] = 2;
            return $data;
        });
        $this->hookIndexQuery(function($query) {
            $query->where("cb_roles_id", "2");
            if(cb()->session()->roleId() == '3')
                $query->where("lembaga_pkbm_id", cb()->session()->user()->lembaga_pkbm_id);

            return $query;
        });
    }
}
