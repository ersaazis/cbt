<?php

namespace App\Http\Controllers;

use App\User;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TerakhirOnlineController extends Controller
{
    public function update(){
        $user=User::find(cb()->session()->id());
        $user->terakhir_online=now();
        $user->save();
        return json_encode(true);
    }
    public function cek($id){
        $user=User::find($id);
        $status='<span data-id="'.$id.'" class="status btn btn-xs btn-danger">Offline</span>';
        if(Carbon::create($user->terakhir_online)->addMinutes(2) > now())
            $status='<span data-id="'.$id.'" class="status btn btn-xs btn-success">Online</span>';
        return $status;
    }
    public function persentase(){
        $user=User::where('cb_roles_id',2);
        $jUser=$user->count();
        if($jUser){
            $onlineUser=$user->where('terakhir_online','>',Carbon::now()->subMinute(2))->count();
            return ($onlineUser/$jUser)*100;
        }
        return 0;
    }
}
