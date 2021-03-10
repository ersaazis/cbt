<?php namespace App\Http\Controllers\Crud;

use Illuminate\Support\Facades\DB;

class AdminProfileController extends \ersaazis\cb\controllers\AdminProfileController {
    public function getIndex() {
        $data = [];
        $data['page_title'] = cbLang("profile");
        if(cb()->session()->roleId() != 2)
            return view(getThemePath('profile'),$data);
        else
            return cb()->redirect(cb()->getAdminPath(),'Jika ada kesalahan mengenai data, silakan hubungi PKBM terkait');
    }
}
