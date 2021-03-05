<?php namespace App\Http\Controllers;

use ersaazis\cb\controllers\CBController;

class AdminLembagaPKBMController extends CBController {


    public function cbInit()
    {
        $this->setTable("lembaga_pkbm");
        $this->setPermalink("lembaga_pkbm");
        $this->setPageTitle("Lembaga PKBM");
        $this->addText("PKBM","pkbm")->strLimit(150)->maxLength(255);
		$this->addText("NPSN","npsn")->strLimit(150)->maxLength(255);
		

    }
}
