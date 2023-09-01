<?php

namespace App\Http\Controllers;

use App\Accounting;
use Illuminate\Http\Request;

class TriController extends Controller
{
    public function getExportList(){
        $accountLists = Accounting::get();
        // dd($accountLists->toArray());
        return view('Admin.Report.tri',compact('accountLists'));
    }
}
