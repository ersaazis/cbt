<?php namespace App\Http\Controllers;

use App\LembagaPkbm;
use App\User;
use ersaazis\cb\controllers\CBController;
use Illuminate\Support\Facades\Hash;

class AdminPemeriksaController extends CBController {

    public function cbInit()
    {
        $this->setTable("users");
        $this->setPermalink("pemeriksa");
        $this->setPageTitle("Pemeriksa");

        $this->addText("Name","name")->strLimit(150)->maxLength(255);
		$this->addCustom("Password","password",'password')->required(cb()->getCurrentMethod() == "getAdd"?true:false)->setHtml('
            <input type="text" title="Password" maxlength="255" class="form-control" '.(cb()->getCurrentMethod() == "getAdd"?"required":"").' name="password" id="password" placeholder="'.(cb()->getCurrentMethod() == "getAdd"?"":"Enter a new password").'">
        ')->validation('required')->showIndex(false)->showDetail(false);
		$this->addSelectTable("Lembaga Pkbm","lembaga_pkbm_id",["table"=>"lembaga_pkbm","value_option"=>"id","display_option"=>"pkbm","sql_condition"=>(cb()->getCurrentMethod() == "getAdd"?"punya_akun=0":"")])->filterable(true);

        $this->addCustom('NPSN','lembaga_pkbm_id')->indexDisplayTransform(function($id) {
            $lembaga=LembagaPkbm::find($id);
            return $lembaga['npsn'];
        })->detailDisplayTransform(function($id) {
            $lembaga=LembagaPkbm::find($id);
            return $lembaga['npsn'];
        })->showEdit(false)->showAdd(false);

        $this->hookBeforeUpdate(function($data, $id) {
            User::find($id)->pkbm->update(['punya_akun'=>0]);

            $lembaga=LembagaPkbm::find($data['lembaga_pkbm_id']);
            $lembaga->punya_akun = 1;
            $lembaga->save();

            $data['cb_roles_id'] = 3;
            if(request('password')) $data['password'] = Hash::make(request('password'));
            else unset($data['password']);
            return $data;
        });
        $this->hookBeforeInsert(function($data) {
            $lembaga=LembagaPkbm::find($data['lembaga_pkbm_id']);
            $lembaga->punya_akun = 1;
            $lembaga->save();
            
            $data['cb_roles_id'] = 3;
            $data['password'] = Hash::make(request('password'));
            return $data;
        });
        $this->hookIndexQuery(function($query) {
            $query->where("cb_roles_id", "3");
            return $query;
        });

    }
}
