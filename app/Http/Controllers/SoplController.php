<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SoplController extends Controller
{
    public function getExportList(){
        return view('Admin.Report.sopl');
    }
}
