<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ReportListController extends Controller
{
    public  function getExportList()
    {
        return view('Admin.reportlist');
    }
}
