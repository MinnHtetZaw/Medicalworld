<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;
use App\Purchase;
use App\Accounting;
use App\SubHeading;
use App\FinancialExpense;
use App\FinancialPurchase;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class FinancialPurchaseController extends Controller
{
    //
    protected function getPurchaseHistory(Request $request){

        $purchase_lists = FinancialPurchase::all();
        // $subheading = SubHeading::where('heading_id',7)->pluck('id');

        // $exp_account = Accounting::wherein('subheading_id',$subheading)->get();

        $exp_account = Accounting::whereHas('subheading.heading.accountingtype',function ($query){
            $query->where('accounting_type_id',5);
       })->get();

        // $expense_tran = Transaction::where('expense_flag',1)->get();
         $bank_account = Accounting::where('subheading_id',19)->get();
         $cash_account = Accounting::where('subheading_id',7)->get();

         $bank_cash_tran = FinancialTransactions::get();

         $currency = Currency::all();

        return view('Admin.financial_purchase_lists', compact('bank_cash_tran','purchase_lists','currency','bank_account','exp_account','cash_account'));
    }//End method

    //Create Purchase
    public function storeFactoryPoExpense(Request $request){


        $exp = FinancialExpense::create([
            'purchase_id' => $request->purchase_id,
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
            'purchase_id' => $request->purchase_id,
            'currency_id' => $request->currency,
            'all_flag'  =>4,
            'expense_id'=> $exp->id

         ]);

        if($request->bank_acc == null){
            $amt = Accounting::find($request->cash_acc);
    //   return $amt;
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
            'purchase_id' =>$request->purchase_id,
            'currency_id' => $request->currency,
            'all_flag'  =>4,
            'expense_id'=> $exp->id
        ]);
        $tran1->related_transaction_id = $tran->id;
        $tran1->save();

        alert('Added Transaction Successfully!!');
      return redirect()->back();
    }//End Method

}
