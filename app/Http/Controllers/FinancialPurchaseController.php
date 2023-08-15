<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;
use App\Purchase;
use App\Accounting;
use App\SubHeading;
use App\BankAccount;
use App\FinancialMaster;
use App\FinancialExpense;
use App\FinancialPurchase;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class FinancialPurchaseController extends Controller
{
    //
    protected function getPurchaseHistory(Request $request){

        $purchase_lists = FinancialPurchase::all();


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

            "initial_currency_id"=>$request->initial_currency_id,
            'final_currency_id'=>$request->final_currency_id,
            'initial_amount'=>$request->initial_amount,
            'final_amount'=>$request->final_amount,
           'amount' => $request->final_amount,
           'remark' => $request->remark,
           'date' => $request->date,
           'purchase_id' => $request->purchase_id,
       ]);

       $FM = FinancialMaster::first();
       $accounting = Accounting::find($FM->purchase_account_id);
       $accounting->balance += $request->initial_amount;
       $accounting->save();

        $tran1 = FinancialTransactions::create([
            'account_id' => $accounting->id,
            'type' => 1,
            'amount' => $request->final_amount,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>1,
            'expense_flag' => 1,
            'purchase_id' => $request->purchase_id,
            'currency_id' => $request->final_currency_id,
            'all_flag'  =>4,
            'expense_id'=> $exp->id

         ]);

        if($request->bank_acc == null){

            $bc_acc = $request->cash_acc;

            $acc_cash = Accounting::find($bc_acc);
            $acc_cash->balance -= $request->final_amount;
            $acc_cash->save();

        }
        else if($request->cash_acc == null){

            $bc_acc = $request->bank_acc;

            $acc_bank = Accounting::find($bc_acc);
            $acc_bank->balance -= $request->final_amount;
            $acc_bank->save();

       $bank=Bank::where('account_id',$request->bank_acc)->first();
       $bank->balance -= $request->final_amount;
       $bank->save();

       if($bank->old_bank_id != null)
       {
           $oldBank = BankAccount::find($bank->old_bank_id);
           $oldBank->balance -=  $request->final_amount;
           $oldBank->save();
       }
        }

        $tran = FinancialTransactions::create([
            'account_id' => $bc_acc,
            'type' => 2,
            'amount' => $request->final_amount,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>2,
            'expense_flag' => 2,
            'purchase_id' =>$request->purchase_id,
            'currency_id' => $request->final_currency_id,
            'all_flag'  =>4,
            'expense_id'=> $exp->id
        ]);
        $tran1->related_transaction_id = $tran->id;
        $tran1->save();

        alert('Added Transaction Successfully!!');
      return redirect()->back();
    }

}
