<?php

namespace App\Http\Controllers;

use App\Accounting;
use App\Http\Resources\TrilResource;
use Illuminate\Http\Request;
use App\FinancialTransactions;
use Illuminate\Support\Facades\DB;

class TriController extends Controller
{
    public function getTriList(){
       
      
        $accountLists = Accounting::with([ 'transactions' => function ($query) {
                $query->select('account_id','date','remark', DB::raw('SUM(CASE WHEN type = "1" THEN amount ELSE 0 END) as debit'), DB::raw('SUM(CASE WHEN type = "2" THEN amount ELSE 0 END) as credit'),
               
             )
                    ->groupBy('account_id','date','remark');
            }])
            // ->where('id', $accountId)
            ->get();
            // return $accountLists;

           
        return view('Admin.Report.tri',compact('accountLists'));


    }//End method
 
    public function getAccountListFilter(Request $request){
      
        $from = $request->from;
        $to = $request->to;
    $date_filter = Accounting::with(['transactions' => function ($query) use ($from, $to) {
        $query->select('account_id','date','remark', DB::raw('SUM(CASE WHEN type = "1" THEN amount ELSE 0 END) as debit_sum'), DB::raw('SUM(CASE WHEN type = "2" THEN amount ELSE 0 END) as credit_sum'))
            ->groupBy('account_id','date','remark')
            ->whereBetween('date',[$from, $to]); // Replace 'date_column_name' with the actual column name for the date field in your transactions table.
    }])
    // ->where('id', $accountId)
    ->get();


        return response()->json([
            'date_filter' => $date_filter
       ]);
    }//End method code by zz
}

