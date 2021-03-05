<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminPaketUjianController extends CBController {


    public function cbInit()
    {
        $this->setTable("paket_ujian");
        $this->setPermalink("paket_ujian");
        $this->setPageTitle("Paket Ujian");

        $this->addText("Nama","nama")->strLimit(150)->maxLength(255);
		

    }
}
