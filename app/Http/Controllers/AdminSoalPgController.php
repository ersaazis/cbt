<?php namespace App\Http\Controllers;

use App\SoalPg;
use ersaazis\cb\controllers\CBController;

class AdminSoalPgController extends CBController {


    public function cbInit()
    {
        $this->setTable("soal_pg");
        $this->setPermalink("soal_pg");
        $this->setPageTitle("Soal Pilihan Ganda");

        $this->addWysiwyg("Soal","soal");
		$this->addImage("Gambar","gambar")->required(false)->encrypt(true);
		$this->addText("Video","video")->required(false)->strLimit(150)->maxLength(255);
		$this->addSelectOption("Jawaban Benar","jawaban")->options(['A'=>'A','B'=>'B','C'=>'C','D'=>'D','E'=>'E']);
		$this->addRadio("Tipe Jawaban","tipe_jawaban")->options(['text'=>'Text','gambar'=>'Gambar']);
		$this->addText("Pilihan A","pilihan_a")->showIndex(false)->strLimit(150)->maxLength(255);
		$this->addText("Pilihan B","pilihan_b")->showIndex(false)->strLimit(150)->maxLength(255);
		$this->addText("Pilihan C","pilihan_c")->showIndex(false)->strLimit(150)->maxLength(255);
		$this->addText("Pilihan D","pilihan_d")->showIndex(false)->strLimit(150)->maxLength(255);
		$this->addText("Pilihan E","pilihan_e")->showIndex(false)->strLimit(150)->maxLength(255);
		$this->addImage("Pilihan A","gambar_pilihan_a")->showIndex(false)->encrypt(true);
		$this->addImage("Pilihan B","gambar_pilihan_b")->showIndex(false)->encrypt(true);
		$this->addImage("Pilihan C","gambar_pilihan_c")->showIndex(false)->encrypt(true);
		$this->addImage("Pilihan D","gambar_pilihan_d")->showIndex(false)->encrypt(true);
		$this->addImage("Pilihan E","gambar_pilihan_e")->showIndex(false)->encrypt(true);
		$this->addSelectTable("Mata Pelajaran","mapel_id",["table"=>"mapel","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);
		$this->addSelectTable("Paket Ujian","paket_ujian_id",["table"=>"paket_ujian","value_option"=>"id","display_option"=>"nama","sql_condition"=>""])->filterable(true);
    }

	public function getAdd()
    {
        if(!module()->canCreate()) return cb()->redirect(cb()->getAdminUrl(),cbLang("you_dont_have_privilege_to_this_area"));

        $data = [];
        $data['page_title'] = "Soal Pilihan Ganda".' : '.cbLang('add');
        $data['action_url'] = module()->addSaveURL();
		if(request('tipe_jawaban')=='text')
	        return view('soal.text',$data);
		elseif(request('tipe_jawaban')=='gambar')
	        return view('soal.gambar',$data);
		else
	        return view('soal.form',$data);
    }

	public function getEdit($id)
    {
        if(!module()->canUpdate()) return cb()->redirect(cb()->getAdminUrl(),cbLang("you_dont_have_privilege_to_this_area"));

        $data = [];
        $data['row'] = SoalPg::find($id);
        $data['page_title'] = "Soal Pilihan Ganda".' : '.cbLang('edit');
        $data['action_url'] = module()->editSaveURL($id);
		if(request('tipe_jawaban')=='text')
	        return view('soal.text',$data);
		elseif(request('tipe_jawaban')=='gambar')
	        return view('soal.gambar',$data);
		else
	        return view('soal.form',$data);
    }

	public function getDetail($id)
    {
        if(!module()->canRead()) return cb()->redirect(cb()->getAdminUrl(),cbLang("you_dont_have_privilege_to_this_area"));

        $data = [];
        $data['row'] = SoalPg::find($id);
        $data['page_title'] = "Soal Pilihan Ganda".' : '.cbLang('detail');
        return view('soal.detail', $data);
    }
}
