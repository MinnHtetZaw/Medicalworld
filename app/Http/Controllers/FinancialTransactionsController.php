<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\FinancialTransactions;

class FinancialTransactionsController extends Controller
{
    //Transaction List
    public function getTransactionList()
    {
        $transaction = FinancialTransactions::all();

        return view('Admin.financial_transaction_list',compact('transaction'));
    }//End Method

    //Transaction Filter
    public function ajaxTransactionFilter(Request $request){

  
        $from = $request->from;
        $to = $request->to;

        $date_filter = FinancialTransactions::whereBetween('date',[$from,$to])->with('accounting')->get();

        return response()->json([
            'date_filter' => $date_filter
       ]);
    }//End method
}
