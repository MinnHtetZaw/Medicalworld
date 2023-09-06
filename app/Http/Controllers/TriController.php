<?php

namespace App\Http\Controllers;

use App\Accounting;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class TriController extends Controller
{
    public function getExportList(){
        // public function orderList(){
        //     $order = Order::select('orders.*','users.name as user_name')
        //                   ->leftJoin('users','users.id', 'orders.user_id')
        //                   ->orderBy('created_at','desc')
        //                   ->get();
        //   return view ('admin.order.list',compact('order'));
        // }
        // $transaction = FinancialTransactions::select('financial_transactions.*','accountings.*')
        //                                       ->leftJoin('accountings')
        //                                       ->get();
        //                dd($transaction->toArray());
        // $transaction = FinancialTransactions::all();
      
// dd($transaction->toArray());
        //    $accountLists = Accounting::get();
            // dd($accountLists->toArray());


        $accountLists = Accounting::select('accountings.*','financial_transactions.*','currencies.name as currency_name')
                                   
                                      ->leftJoin('financial_transactions','accountings.id','financial_transactions.account_id','financial_transactions.amount') 
                                     ->leftJoin('currencies','currencies.id','financial_transactions.currency_id','currencies.name')                 
                                      ->get();;
                    // dd($accountLists->toArray());

        // dd($transaction->toArray());
        $debitTotal = FinancialTransactions::where('type','1')->sum('amount');
    //    return $debitTotal;
        $creditTotal = FinancialTransactions::where('type','2')->sum('amount');
        // return $creditTotal;

        $netDebitTotal = $debitTotal > $creditTotal ? ($debitTotal - $creditTotal) : 0;
        $netCreditTotal = $creditTotal  > $debitTotal? ( $creditTotal- $debitTotal ) : 0;



        return view('Admin.Report.tri',compact('debitTotal','creditTotal','netDebitTotal','netCreditTotal','accountLists'));

    }//End method

    //Filter
    public function getAccountList(Request $request){
      
        $from = $request->from;
        $to = $request->to;
        // $date_filter = FinancialTransactions::whereBetween('date',[$from,$to])->with('accounting','currency')->get();
        $date_filter = Accounting::select('accountings.*','financial_transactions.*','currencies.name as currency_name')
                                   
        ->leftJoin('financial_transactions','accountings.id','financial_transactions.account_id','financial_transactions.amount') 
       ->leftJoin('currencies','currencies.id','financial_transactions.currency_id','currencies.name')                 
       -> whereBetween('date',[$from,$to])
       ->get();;
// dd($date_filter->toArray());
        // $date_filter = Accounting::whereBetween('created_at',[$from,$to])->with('subheading','currency')->get();
        // return $date_filter;

        return response()->json([
            'date_filter' => $date_filter
       ]);
    }//End method
}
