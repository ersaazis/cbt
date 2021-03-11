<?php

namespace App\Http\Controllers;

use App\JadwalUjian;
use App\JawabanUser;
use App\Mapel;
use App\RapotUser;
use App\SoalEssai;
use App\SoalPg;
use Carbon\Carbon;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    public function index(){
        $jadwal=JadwalUjian::where('paket_ujian_id',cb()->session()->user()->paket_ujian_id)->where('tanggal','<',Carbon::now())->first();
        if($jadwal){
            $jurusan=$jadwal->mapel->jurusan;
            if($jurusan == cb()->session()->user()->jurusan or $jurusan == null){
                if(Carbon::make($jadwal->tanggal)->addMinutes(30) > Carbon::now()){
                    $data = [];
                    $data['page_title'] = "Ujian ".$jadwal->mapel->nama;
                    if(RapotUser::where('mapel_id',$jadwal->mapel_id)->where('user_id',cb()->session()->id())->count() == 0){
                        $data['mapel_id'] = $jadwal->mapel_id;
                        $data['tanggal_mulai'] = Carbon::make($jadwal->tanggal)->addMinutes(120);
                        $data['soal'] = (SoalPg::where('paket_ujian_id',cb()->session()->user()->paket_ujian_id)->where('mapel_id',$jadwal->mapel->id)->inRandomOrder()->get());
                        $data['essai'] = (SoalEssai::where('paket_ujian_id',cb()->session()->user()->paket_ujian_id)->where('mapel_id',$jadwal->mapel->id)->inRandomOrder()->get());
                        return view("ujian.soal", $data);
                    } else return cb()->redirect(cb()->getAdminPath(),'Anda sudah menyalesaikan ujian '.$jadwal->mapel->nama.' hari ini');
                } else return cb()->redirect(cb()->getAdminPath(),'Tidak ada jadwal ujian saat ini');
            } else return cb()->redirect(cb()->getAdminPath(),'Tidak ada jadwal ujian saat ini');
        } else return cb()->redirect(cb()->getAdminPath(),'Waktu ujian telah selesai');
    }
    public function simpan(Request $request){
        $jawabanPG=$request->input('jawaban_pg');
        $jawabanEssai=$request->input('jawaban_essai');
        $mapel_id=$request->input('mapel_id');
        if(RapotUser::where('mapel_id',$mapel_id)->where('user_id',cb()->session()->id())->count() == 0){
            $soal = (SoalPg::where('paket_ujian_id',cb()->session()->user()->paket_ujian_id)->where('mapel_id',$mapel_id)->count());
            $essai = (SoalEssai::where('paket_ujian_id',cb()->session()->user()->paket_ujian_id)->where('mapel_id',$mapel_id)->count());
            $total=$soal+$essai;
            $benar=0;
            if($jawabanPG)
                foreach($jawabanPG as $id=>$jawaban){
                    JawabanUser::create([
                        'user_id'=>cb()->session()->id(),
                        'soal_pg_id'=>$id,
                        'jawaban'=>$jawaban
                    ]);
                    $kunci=SoalPg::find($id);
                    if(strtolower($kunci->jawaban) == strtolower($jawaban)){
                        $benar++;
                    }
                }
            if($jawabanEssai)
                foreach($jawabanEssai as $id=>$jawaban){
                    if($jawaban){
                        JawabanUser::create([
                            'user_id'=>cb()->session()->id(),
                            'soal_essai_id'=>$id,
                            'jawaban'=>$jawaban
                        ]);
                        $kunci=SoalEssai::find($id);
                        if($kunci && $jawaban){
                            $benar++;
                        }
                    }
                }
            // $photo = $request->file('foto')->store('images', 'public');
            $nilai=($benar/$total)*100;
            RapotUser::create([
                'user_id'=>cb()->session()->id(),
                'mapel_id'=>$mapel_id,
                'nilai'=>$nilai,
                // 'photo'=>$photo,
            ]);
            $data = [];
            $data['page_title'] = "Hasil Ujian";
            $data['benar'] = $benar;
            $data['salah'] = $total-$benar;
            $data['total'] = $total;
            $data['nilai'] = $nilai;
            $data['mapel'] = Mapel::find($mapel_id)->nama;
            return view('ujian.nilai',$data);
        } else return cb()->redirect(cb()->getAdminPath(),'Anda sudah menyalesaikan ujian hari ini');
    }
}
