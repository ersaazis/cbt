<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminMataPelajaranController extends CBController {


    public function cbInit()
    {
        $this->setTable("mapel");
        $this->setPermalink("mata_pelajaran");
        $this->setPageTitle("Mata Pelajaran");

        $this->addText("Nama","nama")->strLimit(150)->maxLength(255);
		

    }
}
