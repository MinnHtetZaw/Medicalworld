<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;
use App\Accounting;
use App\Transaction;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class BankController extends Controller
{
    //
    protected function financial_bank_list()
    {
        $account = Accounting::all();
        $banks = Bank::all();
        $currency = Currency::all();
        $trans = FinancialTransactions::where('type_flag',2)->get();
 
        return view('Admin.bank_list',compact('account','banks','trans','currency'));
    }//End Method

    //Create Bank
    protected function store_bank(Request $request)
    {

        $acc = Accounting::create([
            'account_code' =>$request->acc_code,
            'account_name' => $request->acc_name,
            "nature"=>$request->nature,
            'subheading_id' =>19,
            'balance' => $request->current_balance,
            'currency_id'=>4
        ]);
        Bank::create([
            'account_id' => $acc->id,
            'account_name' => $request->acc_name,
            'account_code' =>$request->acc_code,
            'opeing_date' => $request->opening_date,
            'account_holder_name' => $request->holder_name,
            'balance' => $request->current_balance,
            'bank_name' => $request->bank_name,
            'bank_address' => $request->bank_address,
            'bank_contact' => $request->bank_contact,
        ]);

        alert()->success('Added Bank Successfully!!!');
        return redirect()->back();
    }

    public function getTransactionList()
    {
        $transaction = FinancialTransactions::all();

        return view('Admin.financial_transaction_list',compact('transaction'));
    }//End Method

    //Store Transfer
    protected function store_tran(Request $request){
        //  return "Hello";
        // dd($request->amount);
        FinancialTransactions::Create([
            'account_id' => $request->from_acc,
            'type'       =>2,
            'amount'     => $request->amount,
            'date'       => $request->date,
            'remark'     =>$request->remark,
            'related_project_flag' =>2,
            'type_flag'   =>2,
        ]);
        $acc = Accounting::find($request->from_acc);
        // return $acc;
        $acc->amount -= $request->amount;
        $acc->save();
        $bank = Bank::where('account_id',$request->from_acc)->first();
        $bank->balance -= $request->amount;

        $bank->save();
        FinancialTransactions::Create([
            'account_id' => $request->transfer_acc,
            'type'       =>1,
            'amount'     => $request->amount,
            'date'       => $request->date,
            'remark'     =>$request->remark,
            'related_project_flag' =>2,
            'type_flag'   =>2,
        ]);
        $acc1 = Accounting::find($request->transfer_acc);
        // dd($acc1->amount);
        $acc1->amount += $request->amount;
        // dd($acc1->amount);
        $acc1->save();
        $bank1 = Bank::where('account_id',$request->transfer_acc)->first();
        $bank1->balance += $request->amount;
        $bank1->save();
        alert()->success('Added Transaction Successfully!!!');
        return redirect()->back();
    }//End Method
 
}
