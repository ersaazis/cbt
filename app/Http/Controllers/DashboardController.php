<?php

namespace App\Http\Controllers;

use App\JadwalUjian;
use Carbon\Carbon;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getIndex() {
        $data = [];
        $data['page_title'] = "Dashboard";
        $data['jadwal'] = JadwalUjian::where('paket_ujian_id',cb()->session()->user()->paket_ujian_id)->get();
        $jadwal=JadwalUjian::where('paket_ujian_id',cb()->session()->user()->paket_ujian_id)->where('tanggal','<=',Carbon::now())->first();
        // if($jadwal && (Carbon::make($jadwal->tanggal)->addMinutes(60) > Carbon::now()))
        //     dd($jadwal->mapel->nama);
        // else
        //     dd('tamat');
        if(cb()->session()->roleId() == 2)
            return view("wargabelajar.upload_foto", $data);
    }
}
