<?php

namespace App\Http\Controllers;

use App\Bank;
use App\Currency;
use App\Accounting;
use App\SubHeading;
use App\HeadingType;
use App\Transaction;
use App\FinancialIncoming;
use Illuminate\Http\Request;
use App\FinancialTransactions;
use App\FinancialAccountingType;

class FinancialAccountController extends Controller
{
    //AccountType Get
    public function getAccountType()
    {
        // return "hello";
        $accounttypes = FinancialAccountingType::all();

        return view('Admin.account_type',compact('accounttypes'));
    }
    //Create AccountTypes
    public function storeAccountType(Request $request)
    {
        //  return $request;
        $accounttype = new FinancialAccountingType();

        $accounttype->type_name=$request->account_type_name;
        $accounttype->description=$request->account_type_description;

        $accounttype->save();


        return back();
    }//End Method

    //Update Financial AccountType
    public function updateAccountType(Request $request,$id)
    {
        // return $id;
        $accounttype = FinancialAccountingType::find($id);

        $accounttype->type_name=$request->account_type_name;
        $accounttype->description=$request->account_type_description;
        $accounttype->save();

        return back();
    }//End Method

    //HeadingType Section
    public function getHeading()
    {
        $accounttypes = FinancialAccountingType::all();

        $headings = HeadingType::all();


        return view('Admin.heading_type',compact('headings','accounttypes'));
    }//End Method

    //Create Heading Type
    public function storeHeading(Request $request)
    {
        // return $request; not complete to resign this
        $heading = new HeadingType();

        $heading->code=$request->code;
        $heading->type_name=$request->heading_name;
        $heading->accounting_type_id=$request->accounting_type_id;
        $heading->save();


        return back();
    }//End method
    
    //Update HeadingType
    public function updateHeading(Request $request,$id)
    {
        // return $id;
        $heading = HeadingType::find($id);

        $heading->code=$request->code;
        $heading->type_name=$request->heading_name;
        $heading->accounting_type_id=$request->accounting_type_id;
        $heading->save();

        return back();
    }//End Method

    //SubHeading List Section
    public function getSubHeading()
    {
        $accounttypes = FinancialAccountingType::all();
        $subheadings = SubHeading::all();
        $headings = HeadingType::all();

        return view('Admin.sub_heading_list',compact('subheadings','headings','accounttypes'));

    }//End Method

    //Create SubHeading
    public function storeSubHeading(Request $request)
    {
        $subheading = new SubHeading();
        $subheading->code=$request->code;
        $subheading->name=$request->subheading_name;
        $subheading->heading_id=$request->heading_id;

        $subheading->save();

        return back();
    }//End Method
    //Search Headign With Ajax
    public function searchHeading(Request $request)
    {

        $heading = HeadingType::where('accounting_type_id',$request->accouting_type_id)->get();

        return response()->json($heading);
    }//End Method

    public function searchSubHeading(Request $request)
    {
        $subheading = SubHeading::where('heading_id',$request->heading_id)->get();

        return response()->json($subheading);
    }//End Method

    //Search Account
    public function searchAccount(Request $request)
    {
        // return $request;
        $accounts = Accounting::where('subheading_id',$request->subheading_id)->get();

        return response()->json($accounts);
    }

    //SubHeading Update
    public function updateSubHeading(Request $request,$id)
    {
        $subheading = SubHeading::find($id);

        $subheading->code=$request->code;
        $subheading->heading_id=$request->heading_id;
        $subheading->name=$request->subheading_name;
        $subheading->save();

        return back();
    }//End Method

    //Account Lists
    public function ShowAccountList(Request $request) {
        // return $request;

        $account = Accounting::all();
        $subheadings = SubHeading::all();
        $headings= HeadingType::all();
        $account_type = FinancialAccountingType::all();
        $currency  = Currency::all();

         return view('Admin.account_list',compact('currency','account','account_type','subheadings','headings'));
    }

    //Create Accounting
    public function storeAccounting(Request $request)
    {
//   return $request;
            Accounting::create([
            'account_code' => $request->acc_code,
            'account_name' => $request->acc_name,
            'subheading_id' => $request->subheading_id,
            'currency_id' =>$request->currency,
            'balance' => $request->balance,
            'nature'=> $request->nature
           ]);

        return back();
   }//End method

   //Update Accounting
   public function update_accounting(Request $request,$id){

    $update = Accounting::find($id);

    $update->account_code = $request->acc_code;
    $update->account_name = $request->acc_name;
    $update->subheading_id = $request->subheading_id;
    $update->currency_id = $request->currency;
    $update->balance = $request->balance;
    $update->nature = $request->nature;
    $update->save();

        return back();
}//End Method


    //Search Accounting
    public function searchAccounting(Request $request)
    {
         $account =Accounting::where('account_name','like','%'.$request->search.'%')->get();
         $subheadings = SubHeading::all();
         $headings= HeadingType::all();
         $account_type = FinancialAccountingType::all();
         $currency  = Currency::all();
 
         return view('Admin.account_list',compact('currency','account','account_type','subheadings','headings'));
    }//End Method

    //Get financial incoming
    protected function incoming()
    {
        $incoming_tran = FinancialTransactions::where('incoming_flag',1)->get();
 
        $bank_cash_tran = FinancialTransactions::where('incoming_flag',2)->get();
 
         $cash_account = Accounting::where('subheading_id',7)->get();
         $bank_account = Accounting::where('subheading_id',19)->get();
 
         $inc_account = Accounting::where('subheading_id',6)->get();
 
        $currency = Currency::all();
 
        return view('Admin.financial_incoming',compact('currency','bank_account','cash_account','inc_account','incoming_tran','bank_cash_tran'));
    }//End Method

    //Store Incoming
    protected function store_incoming(Request $request){
        //  return $request;
          

        $incoming = FinancialIncoming::create([
            'amount' => $request->amount,
            'remark' => $request->remark,
            'date' => $request->date,
        ]);

        $tran1 = FinancialTransactions::create([
            'account_id' =>$request->incoming_acc,
            'type' => 2, // credit
            'amount' => $request->amount,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>4, // income credit type
            'currency_id' => $request->currency,
            'all_flag' =>3,
            'incoming_flag'=>1,
            'incoming_id'=>$incoming->id
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
            $acc_cash->balance += $con_amt;
            $acc_cash->save();

            $incoming_cash = Accounting::find($request->incoming_acc);
            $incoming_cash->balance -= $request->amount;
            $incoming_cash->save();
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

            $bank = Bank::where('account_id',$bc_acc)->first();
            $bank->balance +=  $con_amt;
            $bank->save();

            $acc_bank = Accounting::find($bc_acc);
            $acc_bank->balance += $con_amt;
            $acc_bank->save();

            $incoming_bank = Accounting::find($request->incoming_acc);
            $incoming_bank->balance -= $request->amount;
            $incoming_bank->save();
        }
        $tran = FinancialTransactions::create([
            'account_id' => $bc_acc,
            'type' => 1,
            'amount' => $con_amt,
            'remark' => $request->remark,
            'date' => $request->date,
            'type_flag' =>3,
            'incoming_flag' => 2,
            'currency_id' => $request->currency,
            'all_flag' =>3,
            'incoming_id'=>$incoming->id
        ]);

        $tran1->related_transaction_id = $tran->id;
        $tran1->save();


        alert('Added Transaction Successfully!!');
      return redirect()->back();
    }//End Method

    //Incoming Ajax Search Code
    protected function ajax_search_code(Request $request){
        // return $request;
        $code = $request->code;
        $acc = Accounting::where('account_code', $code)->first();
        $code = FinancialTransactions::where('all_flag',3)
                        ->where('type_flag',3)
                        ->where('account_id',$acc->id)
                        ->with('accounting')
                        ->get();
        $code_relate = FinancialTransactions::where('all_flag',3)
                        ->with('accounting')
                        ->where('type_flag',4)->get();

        return response()->json([
            'code' => $code,
            'code_relate' => $code_relate,
        ]);
    }//End Method

    //Incoming Ajax Convert
    public function ajax_convert(Request $request){
        $bk_ch_acc = $request->bk_ch;
        $convert = Accounting::find($bk_ch_acc);
        $usd_rate = Currency::find(5);
        $euro_rate = Currency::find(6);
        $sgp_rate = Currency::find(9);
        $jpn_rate = Currency::find(10);
        $chn_rate = Currency::find(11);
        $idn_rate = Currency::find(12);
        $mls_rate = Currency::find(13);
        $thai_rate = Currency::find(14);
        return response()->json([
            'convert' => $convert,
            'usd_rate' => $usd_rate,
            'sgp_rate' => $sgp_rate,
            'jpn_rate' => $jpn_rate,
            'chn_rate' => $chn_rate,
            'idn_rate' => $idn_rate,
            'mls_rate' => $mls_rate,
            'thai_rate' => $thai_rate,
            'euro_rate' => $euro_rate]);
    }//End method
 //Ajax Date Filter
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
}
