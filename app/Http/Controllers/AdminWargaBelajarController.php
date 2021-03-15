<?php namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
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
		$this->addText("Nomor Ujian","nomor_ujian")->strLimit(150)->maxLength(255);
		$this->addSelectTable("Paket Ujian","paket_ujian_id",["table"=>"paket_ujian","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);
		$this->addSelectOption("Jurusan","jurusan")->options(['IPA'=>'IPA','IPS'=>'IPS',null=>'Tidak Ada']);
		$this->addSelectTable("Lembaga Pkbm","lembaga_pkbm_id",["table"=>"lembaga_pkbm","value_option"=>"id","display_option"=>"pkbm","sql_condition"=>""])->filterable(true);

        $this->addText('Status','id')->indexDisplayTransform(function($id) {
            $user=User::find($id);
            $status='<span class="btn btn-xs btn-danger">Offline</span>';
            if(Carbon::create($user->terakhir_online)->addMinutes(2) > now())
                $status='<span class="btn btn-xs btn-success">Online</span>';
            return "<div data-id='$id' class='status'>$status</div>";
        })->detailDisplayTransform(function($id) {
            return 1;
        })->showEdit(false)->showAdd(false)->defaultValue(null);

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
        $this->setBeforeIndexTable(view('wargabelajar.index_before')->render());
        $this->javascript(function(){
            return '
            $.get( "/cbt/persentase", function( data ) {
                $("#LoginWarga").html(data);
            });
            setInterval(function() {
                $(".status").each(function(){
                    var id=$(this).attr("data-id");
                    var $button=$(this);
                    $.get( "/cbt/cek/"+id, function( data ) {
                        $button.html(data);
                    });
                });
                $.get( "/cbt/persentase", function( data ) {
                    $("#LoginWarga").html(data);
                });
            }, 90 * 1000);
            ';
        });
    }
}
