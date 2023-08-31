<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SofbController extends Controller
{
    public function getExportList(){
        return view('Admin.Report.sofb');
    }
}
