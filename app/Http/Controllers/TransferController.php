<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;
use App\Transfer;
use App\Accounting;
use App\TransferTransaction;
use Illuminate\Http\Request;

class TransferController extends Controller
{
    public function TransferList()
    {
        $cash_accounts = Accounting::where('subheading_id',7)->get();
        $bank_accounts = Accounting::where('subheading_id',19)->get();
        $transfers = Transfer::with('fromAccount','toAccount','transactions')->get();

        return view('Admin.transfer_list',compact('transfers','cash_accounts','bank_accounts'));
    }//End method


    //Create Transfer
    public function storeTransfer(Request $request)
    {
    //   dd($request->toArray());
        $from_acc = $request->from_bank_acc != null ? $request->from_bank_acc : $request->from_cash_acc;
        $to_acc = $request->to_bank_acc !=null ? $request->to_bank_acc : $request->to_cash_acc;

               $transfer= Transfer::create([
                    'from_account_id'=>$from_acc,
                    'to_account_id'=>$to_acc,
                    'amount'=> $request->amount,
                    'transfer_date'=>$request->date,
                    'remark'=>$request->remark
                ]);

                $fromAccount = Accounting::find($from_acc);
                $toAccount = Accounting::find($to_acc);


                if($request->from_account == 1 ) // Bank Type
                {
                    $bank_acc = Accounting::find($fromAccount->id);
                    $bank_acc->balance -= $request->amount;
                    $bank_acc->save();

                    $bank=Bank::where('account_id',$fromAccount->id)->first();
                    $bank->balance -= $request->amount;
                    $bank->save();

                    $from_current_amount =$bank_acc->balance;
                }
                else // Cash Type
                {
                    $cash = Accounting::find($fromAccount->id);
                    $cash->balance -= $request->amount;
                    $cash->save();

                    $from_current_amount =$cash->balance;
                }


                if($request->to_account == 1 ) // Bank Type
                {
                    $con_amt = $this->convertRate($toAccount,$fromAccount,$request->amount);

                    $bank_account = Accounting::find($toAccount->id);
                    $bank_account->balance += $con_amt;
                    $bank_account->save();

                    $bank=Bank::where('account_id',$toAccount->id)->first();
                    $bank->balance += $con_amt;
                    $bank->save();

                    $to_current_amount =$bank_account->balance;

                }
                else // Cash Type
                {
                    $con_amt = $this->convertRate($toAccount,$fromAccount,$request->amount);

                    $cash = Accounting::find($toAccount->id);
                    $cash->balance += $con_amt;
                    $cash->save();

                    $to_current_amount =$cash->balance;
                }

                TransferTransaction::create([
                    'account_id'=>$from_acc,
                    'transfer_id'=>$transfer->id,
                    'transaction_type'=> 2 , //Credit
                    'current_amount'=>$from_current_amount
                ]);

                TransferTransaction::create([
                    'account_id'=>$to_acc,
                    'transfer_id'=>$transfer->id,
                    'transaction_type'=> 1 , //debit
                    'current_amount'=>$to_current_amount
                ]);


                return back();

    }//End method
    protected function convertRate($toAccount,$fromAccount,$amount)
    {
        $from = $fromAccount->currency_id;
        $to = $toAccount->currency_id;

        $usd_rate = Currency::find(5);
        $euro_rate = Currency::find(6);
        $sgp_rate = Currency::find(9);
        $jpn_rate = Currency::find(10);
        $chn_rate = Currency::find(11);
        $idn_rate = Currency::find(12);
        $mls_rate = Currency::find(13);
        $thai_rate = Currency::find(14);

        if($from == 4 && $to == 5){
            $con_amt = $amount / $usd_rate->exchange_rate;
        }
        else if($from == 4 && $to == 6){
            $con_amt = $amount / $euro_rate->exchange_rate;
        }
        else if($from == 4 && $to == 9){
            $con_amt = $amount / $sgp_rate->exchange_rate;
        }
        else if($from == 4 && $to == 10){
            $con_amt = $amount / $jpn_rate->exchange_rate;
        }
        else if($from == 4 && $to == 11){
            $con_amt = $amount / $chn_rate->exchange_rate;
        }
        else if($from == 4 && $to == 12){
            $con_amt = $amount / $idn_rate->exchange_rate;
        }
        else if($from == 4 && $to == 13){
            $con_amt = $amount / $mls_rate->exchange_rate;
        }
        else if($from == 4 && $to == 14){
            $con_amt = $amount / $thai_rate->exchange_rate;
        }
        else if($from == 5 && $to == 4){
            $con_amt = $amount * $usd_rate->exchange_rate;
        }
        else if($from == 6 && $to == 4){
            $con_amt = $amount * $euro_rate->exchange_rate;
        }
        else if($from == 9 && $to == 4){
            $con_amt = $amount * $sgp_rate->exchange_rate;
        }
        else if($from == 10 && $to == 4){
            $con_amt = $amount * $jpn_rate->exchange_rate;
        }
        else if($from == 11 && $to == 4){
            $con_amt = $amount * $chn_rate->exchange_rate;
        }
        else if($from == 12 && $to == 4){
            $con_amt = $amount * $idn_rate->exchange_rate;
        }
        else if($from == 13 && $to == 4){
            $con_amt = $amount * $mls_rate->exchange_rate;
        }
        else if($from == 14 && $to == 4){
            $con_amt = $amount * $thai_rate->exchange_rate;
        }
        else{
            $con_amt = $amount;
        }
        return $con_amt;
    }


}
