<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;
use App\Accounting;
use App\SubHeading;
use App\FinancialExpense;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class FinancialExpenseController extends Controller
{
    //Expense Lists
    protected function expense()
   {

       $expense_tran = FinancialTransactions::where('expense_flag',1)->get();

       $bank_cash_tran = FinancialTransactions::where('expense_flag',2)->get();

        $bank_account = Accounting::where('subheading_id',19)->get();
        $cash_account = Accounting::where('subheading_id',7)->get();

        $subheading = SubHeading::where('heading_id',7)->pluck('id');

        $exp_account = Accounting::wherein('subheading_id',$subheading)->get();

        $currency = Currency::all();

       return view('Admin.financial_expense',compact('currency','bank_account','expense_tran','bank_cash_tran','exp_account','cash_account'));
   }//End method

         protected function get_exchange_rate(){

        $conversionRate = Currency::
        all();
        return $conversionRate;
         }

   //Store Financial Expense
   protected function financial_store_expense(Request $request)
   {
    // // return $request;
    //     $initialValue = $request->initial_amount;
    //     $initialCurrency = $request->initial_currency;
    //     $finalCurrency = $request->final_currency;
    //     // return $initialCurrency;

    //     $conversionRate = Currency::where('id', $initialCurrency)
    //     ->value('exchange_rate');
    //     return $conversionRate;

    //     if (!$conversionRate) {
    //         // Handle case where conversion rate is not found
    //         // You can redirect back with an error message or handle it as needed.
    //     }

    //     // Calculate converted value
    //     $convertedValue = $initialValue * $conversionRate;

    //     return view('currency-converter', [
    //         'initial_value' => $initialValue,
    //         'initial_currency' => $initialCurrency,
    //         'final_currency' => $finalCurrency,
    //         'convertedValue' => $convertedValue,
    //     ]);
    // ////

      $exp = FinancialExpense::create([

           'amount' => $request->amount,
           'remark' => $request->remark,
           'date' => $request->date,
       ]);

       $tran1 = FinancialTransactions::create([
           'account_id' =>$request->exp_acc ,
           'type' => 1,
           'amount' => $request->amount,
           'remark' => $request->remark,
           'date' => $request->date,
           'type_flag' =>1,
           'expense_flag' => 1,
           'currency_id' => $request->currency,
           'all_flag'  =>4,
           'expense_id'=> $exp->id
        ]);
       if($request->bank_acc == null){
           $amt = Accounting::find( $request->cash_acc);

           $usd_rate = Currency::find(5);
           $euro_rate = Currency::find(6);
           $sgp_rate = Currency::find(9);
           $jpn_rate = Currency::find(10);
           $chn_rate = Currency::find(11);
           $idn_rate = Currency::find(12);
           $mls_rate = Currency::find(13);
           $thai_rate = Currency::find(14);
           if($amt->currency_id == 4 && $request->currency == 5){
               $con_amt = $request->amount * $usd_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 6){
               $con_amt = $request->amount * $euro_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 9){
               $con_amt = $request->amount * $sgp_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 10){
               $con_amt = $request->amount * $jpn_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 11){
               $con_amt = $request->amount * $chn_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 12){
               $con_amt = $request->amount * $idn_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 13){
               $con_amt = $request->amount * $mls_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 14){
               $con_amt = $request->amount * $thai_rate->exchange_rate;
           }
           else if($amt->currency_id == 5 && $request->currency == 4){
               $con_amt = $request->amount / $usd_rate->exchange_rate;
           }
           else if($amt->currency_id == 6 && $request->currency == 4){
               $con_amt = $request->amount / $euro_rate->exchange_rate;
           }
           else if($amt->currency_id == 9 && $request->currency == 4){
               $con_amt = $request->amount / $sgp_rate->exchange_rate;
           }
           else if($amt->currency_id == 10 && $request->currency == 4){
               $con_amt = $request->amount / $jpn_rate->exchange_rate;
           }
           else if($amt->currency_id == 11 && $request->currency == 4){
               $con_amt = $request->amount / $chn_rate->exchange_rate;
           }
           else if($amt->currency_id == 12 && $request->currency == 4){
               $con_amt = $request->amount / $idn_rate->exchange_rate;
           }
           else if($amt->currency_id == 13 && $request->currency == 4){
               $con_amt = $request->amount / $mls_rate->exchange_rate;
           }
           else if($amt->currency_id == 14 && $request->currency == 4){
               $con_amt = $request->amount / $thai_rate->exchange_rate;
           }
           else{
               $con_amt = $request->amount;
           }

           $bc_acc = $request->cash_acc;

           $acc_cash = Accounting::find($bc_acc);
           $acc_cash->balance -= $con_amt;
           $acc_cash->save();

           $exp_cash = Accounting::find($request->exp_acc);
           $exp_cash->balance += $request->amount;
           $exp_cash->save();
       }
       else if($request->cash_acc == null){
           $amt = Accounting::find($request->bank_acc);

           $usd_rate = Currency::find(5);
           $euro_rate = Currency::find(6);
           $sgp_rate = Currency::find(9);
           $jpn_rate = Currency::find(10);
           $chn_rate = Currency::find(11);
           $idn_rate = Currency::find(12);
           $mls_rate = Currency::find(13);
           $thai_rate = Currency::find(14);

           if($amt->currency_id == 4 && $request->currency == 5){
               $con_amt = $request->amount * $usd_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 6){
               $con_amt = $request->amount * $euro_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 9){
               $con_amt = $request->amount * $sgp_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 10){
               $con_amt = $request->amount * $jpn_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 11){
               $con_amt = $request->amount * $chn_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 12){
               $con_amt = $request->amount * $idn_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 13){
               $con_amt = $request->amount * $mls_rate->exchange_rate;
           }
           else if($amt->currency_id == 4 && $request->currency == 14){
               $con_amt = $request->amount * $thai_rate->exchange_rate;
           }
           else if($amt->currency_id == 5 && $request->currency == 4){
               $con_amt = $request->amount / $usd_rate->exchange_rate;
           }
           else if($amt->currency_id == 6 && $request->currency == 4){
               $con_amt = $request->amount / $euro_rate->exchange_rate;
           }
           else if($amt->currency_id == 9 && $request->currency == 4){
               $con_amt = $request->amount / $sgp_rate->exchange_rate;
           }
           else if($amt->currency_id == 10 && $request->currency == 4){
               $con_amt = $request->amount / $jpn_rate->exchange_rate;
           }
           else if($amt->currency_id == 11 && $request->currency == 4){
               $con_amt = $request->amount / $chn_rate->exchange_rate;
           }
           else if($amt->currency_id == 12 && $request->currency == 4){
               $con_amt = $request->amount / $idn_rate->exchange_rate;
           }
           else if($amt->currency_id == 13 && $request->currency == 4){
               $con_amt = $request->amount / $mls_rate->exchange_rate;
           }
           else if($amt->currency_id == 14 && $request->currency == 4){
               $con_amt = $request->amount / $thai_rate->exchange_rate;
           }
           else{
               $con_amt = $request->amount;
           }


           $bc_acc = $request->bank_acc;

           $acc_bank = Accounting::find($bc_acc);
           $acc_bank->balance -= $con_amt;
           $acc_bank->save();

           $exp_bank = Accounting::find($request->exp_acc);
           $exp_bank->balance += $request->amount;
           $exp_bank->save();

           $bank=Bank::where('account_id',$request->bank_acc)->first();
           $bank->balance -= $con_amt;
           $bank->save();
       }

       $tran = FinancialTransactions::create([
           'account_id' => $bc_acc,
           'type' => 2,
           'amount' => $con_amt,
           'remark' => $request->remark,
           'date' => $request->date,
           'type_flag' =>2,
           'expense_flag' => 2,
           'currency_id' => $request->currency,
           'all_flag'  =>4,
           'expense_id'=> $exp->id
       ]);

       $tran1->related_transaction_id = $tran->id;
       $tran1->save();

       alert('Added Transaction Successfully!!');
     return redirect()->back();
   }//End Method

   //Ajax Convert
   public function ajax_convert(){

    // $bk_ch_acc = $request->bk_ch;

    // $convert = Accounting::find($bk_ch_acc);

    $usd_rate = Currency::find(5);
    $euro_rate = Currency::find(6);
    $sgp_rate = Currency::find(9);
    $jpn_rate = Currency::find(10);
    $chn_rate = Currency::find(11);
    $idn_rate = Currency::find(12);
    $mls_rate = Currency::find(13);
    $thai_rate = Currency::find(14);


    return response()->json([
        // 'convert' => $convert,
        'usd_rate' => $usd_rate,
        'sgp_rate' => $sgp_rate,
        'jpn_rate' => $jpn_rate,
        'chn_rate' => $chn_rate,
        'idn_rate' => $idn_rate,
        'mls_rate' => $mls_rate,
        'thai_rate' => $thai_rate,
        'euro_rate' => $euro_rate]);
}//End method

public function ajax_date_filter(Request $request){
    // dd($request->all());
    $from = $request->from;
    $to = $request->to;
    $date_filter = FinancialTransactions::where('all_flag',3)
                ->where('type_flag',3)
                ->whereBetween('date',[$from,$to])->with('accounting')->get();
    $date_filt = FinancialTransactions::where('all_flag',3)
                ->where('type_flag',4)
                ->whereBetween('date',[$from,$to])->with('accounting')->get();
    return response()->json([
        'date_filter' => $date_filter,
        'date_filt'   => $date_filt,
   ]);
}//End method

//Seaech code with ajax

protected function ajax_code_search(Request $request){
    $code = $request->code;
    $acc = Accounting::where('account_code', $code)->first();
    $code = FinancialTransactions::where('all_flag',4)
                    ->where('type_flag',1)
                    ->where('account_id',$acc->id)
                    ->with('accounting')
                    ->get();
    $code_relate = FinancialTransactions::where('all_flag',4)
                    ->with('accounting')
                    ->where('type_flag',2)->get();

    return response()->json([
        'code' => $code,
        'code_relate' => $code_relate,
    ]);
}//End method

//Filter with Date by  Ajax
public function ajax_filter_date(Request $request){
    // dd($request->all());
    $from = $request->from;
    $to = $request->to;
    $date_filter = FinancialTransactions::where('all_flag',4)
                ->where('type_flag',1)
                ->whereBetween('date',[$from,$to])->with('accounting')->get();
    $date_filt = FinancialTransactions::where('all_flag',4)
                ->where('type_flag',2)
                ->whereBetween('date',[$from,$to])->with('accounting')->get();
    return response()->json([
        'date_filter' => $date_filter,
        'date_filt'   => $date_filt,
   ]);
}//End method
//Expense Delete
public function expenseDelete($id)
{
 $trans = FinancialTransactions::find($id);
 FinancialExpense::destroy($trans->expense_id);
 FinancialTransactions::destroy($id);
 return back();
}//End method

}
