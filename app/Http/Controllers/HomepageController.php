<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomepageController extends Controller
{

    
    public function index() {

        $hour = date("H");

        $curDate = date("Y-m-d");

        return view("welcome", compact("curDate", "hour"));
    }
}
