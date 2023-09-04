<?php

namespace App\Http\Controllers;

use App\Accounting;
use Illuminate\Http\Request;

class TriController extends Controller
{
    public function getExportList(){
        $accountLists = Accounting::get();
        $debitTotal = Accounting::where('nature',1)->sum('balance');
        $creditTotal = Accounting::where('nature',2)->sum('balance');

        $netDebitTotal = $debitTotal > $creditTotal ? ($debitTotal - $creditTotal) : 0;
        $netCreditTotal = $creditTotal  > $debitTotal? ( $creditTotal- $debitTotal ) : 0;




        return view('Admin.Report.tri',compact('accountLists','debitTotal','creditTotal','netDebitTotal','netCreditTotal'));
    }
}
