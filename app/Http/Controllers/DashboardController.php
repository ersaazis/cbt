<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getIndex() {
        $data = [];
        $data['page_title'] = "Dashboard";
        if(cb()->session()->roleId() == 2)
            return view("wargabelajar.upload_foto", $data);
    }
}
