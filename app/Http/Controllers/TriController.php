<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TriController extends Controller
{
    public function getExportList(){
        return view('Admin.Report.tri');
    }
}
