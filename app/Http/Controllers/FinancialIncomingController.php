<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;
use App\Accounting;
use App\FinancialIncoming;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class FinancialIncomingController extends Controller
{
    //
    // protected function store_incoming(Request $request){


    //     $incoming = FinancialIncoming::create([
    //         'amount' => $request->amount,
    //         'remark' => $request->remark,
    //         'date' => $request->date,
    //     ]);

    //     $tran1 = FinancialTransactions::create([
    //         'account_id' =>$request->incoming_acc,
    //         'type' => 2, // credit
    //         'amount' => $request->amount,
    //         'remark' => $request->remark,
    //         'date' => $request->date,
    //         'type_flag' =>4, // income credit type
    //         'currency_id' => $request->currency,
    //         'all_flag' =>3,
    //         'incoming_flag'=>1,
    //         'incoming_id'=>$incoming->id
    //     ]);
    //     if($request->bank_acc == null){
    //         $amt = Accounting::find( $request->cash_acc);

    //         $usd_rate = Currency::find(5);
    //         $euro_rate = Currency::find(6);
    //         $sgp_rate = Currency::find(9);
    //         $jpn_rate = Currency::find(10);
    //         $chn_rate = Currency::find(11);
    //         $idn_rate = Currency::find(12);
    //         $mls_rate = Currency::find(13);
    //         $thai_rate = Currency::find(14);
    //         if($amt->currency_id == 4 && $request->currency == 5){
    //             $con_amt = $request->amount * $usd_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 6){
    //             $con_amt = $request->amount * $euro_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 9){
    //             $con_amt = $request->amount * $sgp_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 10){
    //             $con_amt = $request->amount * $jpn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 11){
    //             $con_amt = $request->amount * $chn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 12){
    //             $con_amt = $request->amount * $idn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 13){
    //             $con_amt = $request->amount * $mls_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 14){
    //             $con_amt = $request->amount * $thai_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 5 && $request->currency == 4){
    //             $con_amt = $request->amount / $usd_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 6 && $request->currency == 4){
    //             $con_amt = $request->amount / $euro_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 9 && $request->currency == 4){
    //             $con_amt = $request->amount / $sgp_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 10 && $request->currency == 4){
    //             $con_amt = $request->amount / $jpn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 11 && $request->currency == 4){
    //             $con_amt = $request->amount / $chn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 12 && $request->currency == 4){
    //             $con_amt = $request->amount / $idn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 13 && $request->currency == 4){
    //             $con_amt = $request->amount / $mls_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 14 && $request->currency == 4){
    //             $con_amt = $request->amount / $thai_rate->exchange_rate;
    //         }
    //         else{
    //             $con_amt = $request->amount;
    //         }
    //         $bc_acc = $request->cash_acc;

    //         $acc_cash = Accounting::find($bc_acc);
    //         $acc_cash->balance += $con_amt;
    //         $acc_cash->save();

    //         $incoming_cash = Accounting::find($request->incoming_acc);
    //         $incoming_cash->balance -= $request->amount;
    //         $incoming_cash->save();
    //     }
    //     else if($request->cash_acc == null){
    //         $amt = Accounting::find($request->bank_acc);
    //         $usd_rate = Currency::find(5);
    //         $euro_rate = Currency::find(6);
    //         $sgp_rate = Currency::find(9);
    //         $jpn_rate = Currency::find(10);
    //         $chn_rate = Currency::find(11);
    //         $idn_rate = Currency::find(12);
    //         $mls_rate = Currency::find(13);
    //         $thai_rate = Currency::find(14);

    //         if($amt->currency_id == 4 && $request->currency == 5){
    //             $con_amt = $request->amount * $usd_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 6){
    //             $con_amt = $request->amount * $euro_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 9){
    //             $con_amt = $request->amount * $sgp_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 10){
    //             $con_amt = $request->amount * $jpn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 11){
    //             $con_amt = $request->amount * $chn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 12){
    //             $con_amt = $request->amount * $idn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 13){
    //             $con_amt = $request->amount * $mls_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 4 && $request->currency == 14){
    //             $con_amt = $request->amount * $thai_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 5 && $request->currency == 4){
    //             $con_amt = $request->amount / $usd_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 6 && $request->currency == 4){
    //             $con_amt = $request->amount / $euro_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 9 && $request->currency == 4){
    //             $con_amt = $request->amount / $sgp_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 10 && $request->currency == 4){
    //             $con_amt = $request->amount / $jpn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 11 && $request->currency == 4){
    //             $con_amt = $request->amount / $chn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 12 && $request->currency == 4){
    //             $con_amt = $request->amount / $idn_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 13 && $request->currency == 4){
    //             $con_amt = $request->amount / $mls_rate->exchange_rate;
    //         }
    //         else if($amt->currency_id == 14 && $request->currency == 4){
    //             $con_amt = $request->amount / $thai_rate->exchange_rate;
    //         }
    //         else{
    //             $con_amt = $request->amount;
    //         }

    //         $bc_acc = $request->bank_acc;

    //         $bank = Bank::where('account_id',$bc_acc)->first();
    //         $bank->balance +=  $con_amt;
    //         $bank->save();

    //         $acc_bank = Accounting::find($bc_acc);
    //         $acc_bank->balance += $con_amt;
    //         $acc_bank->save();

    //         $incoming_bank = Accounting::find($request->incoming_acc);
    //         $incoming_bank->balance -= $request->amount;
    //         $incoming_bank->save();
    //     }
    //     $tran = FinancialTransactions::create([
    //         'account_id' => $bc_acc,
    //         'type' => 1,
    //         'amount' => $con_amt,
    //         'remark' => $request->remark,
    //         'date' => $request->date,
    //         'type_flag' =>3,
    //         'incoming_flag' => 2,
    //         'currency_id' => $request->currency,
    //         'all_flag' =>3,
    //         'incoming_id'=>$incoming->id
    //     ]);

    //     $tran1->related_transaction_id = $tran->id;
    //     $tran1->save();


    //     alert('Added Transaction Successfully!!');
    //   return redirect()->back();
    // }

}
