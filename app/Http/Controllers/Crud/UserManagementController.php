<?php
/**
 * Created by PhpStorm.
 * User: User
 * Date: 4/25/2019
 * Time: 9:28 PM
 */

namespace App\Http\Controllers\Crud;

use Illuminate\Support\Facades\DB;

class UserManagementController extends \ersaazis\usermanagement\controllers\AdminUserManagementController
{
    private $view = "usermanagement::users";

    public function __construct()
    {
        view()->share(['page_title'=>'Admin dan Pembuat Soal']);
    }
    public function getIndex() {
        if(!$this->myPrivileges()->can_browse) return cb()->redirect(cb()->getAdminUrl(),cbLang("you_dont_have_privilege_to_this_area"));
        $data = [];
        $data['result'] = DB::table("users")
            ->join("cb_roles","cb_roles.id","=","cb_roles_id")
            ->select("users.*","cb_roles.name as cb_roles_name")
            ->where('users.cb_roles_id','!=',2)
            ->where('users.cb_roles_id','!=',3)
            ->get();
        return view($this->view.'.index',$data);
    }
    public function getAdd() {
        if(!$this->myPrivileges()->can_create) return cb()->redirect(cb()->getAdminUrl(),cbLang("you_dont_have_privilege_to_this_area"));
        $data = [];
        $data['roles'] = DB::table("cb_roles")->where('id','!=',2)->where('id','!=',3)->get();
        return view($this->view.'.add', $data);
    }

    
    public function myPrivileges(){
        if(cb()->session()->id()){
            $menu = cb()->find("cb_menus",[
                "type"=>'path',
                "path"=>'users'
            ]);
            $privilege = cb()->find("cb_role_privileges",[
                "cb_menus_id"=>$menu->id,
                "cb_roles_id"=>cb()->session()->roleId()
            ]);
            return $privilege;    
        }
        $privilege=[];
        $privilege->can_browse=false;
        $privilege->can_create=false;
        $privilege->can_read=false;
        $privilege->can_update=false;
        $privilege->can_delete=false;
        return false;
    }
}