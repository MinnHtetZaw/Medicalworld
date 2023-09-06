<?php

namespace App\Http\Controllers;

use App\Accounting;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class TriController extends Controller
{
    public function getExportList(){
        $transaction = FinancialTransactions::all();
        // dd($transaction->toArray());
        $debitTotal = FinancialTransactions::where('type','1')->sum('amount');
    //    return $debitTotal;
        $creditTotal = FinancialTransactions::where('type','2')->sum('amount');
        // return $creditTotal;

        $netDebitTotal = $debitTotal > $creditTotal ? ($debitTotal - $creditTotal) : 0;
        $netCreditTotal = $creditTotal  > $debitTotal? ( $creditTotal- $debitTotal ) : 0;



        return view('Admin.Report.tri',compact('transaction','debitTotal','creditTotal','netDebitTotal','netCreditTotal'));

    }//End method

    //Filter
    public function getAccountList(Request $request){
      
        $from = $request->from;
        $to = $request->to;
        $date_filter = FinancialTransactions::whereBetween('date',[$from,$to])->with('accounting','currency')->get();

        // $date_filter = Accounting::whereBetween('created_at',[$from,$to])->with('subheading','currency')->get();
        // return $date_filter;

        return response()->json([
            'date_filter' => $date_filter
       ]);
    }//End method
}
