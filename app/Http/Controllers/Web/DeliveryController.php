<?php

namespace App\Http\Controllers\Web;

use App\Bank;
use App\From;
use App\Item;
use App\User;
use DateTime;
use App\Voucher;
use App\Category;
use App\Currency;
use App\Customer;
use App\Discount;
use App\Employee;
use App\Accounting;
use App\Stockcount;
use App\BankAccount;
use App\Packagetype;
use App\SubCategory;
use App\Transaction;
use App\Wayplanning;
use App\CountingUnit;
use App\DiscountMain;
use App\SalesCustomer;
use App\Deliveryreceive;
use App\FinancialMaster;
use Dotenv\Regex\Success;
use App\FinancialIncoming;
use Illuminate\Http\Request;
use App\FinancialTransactions;
use App\SaleCustomerCreditlist;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;

class DeliveryController extends Controller
    {

    public function wayPlaningForm()
    {
        $deliverorder = Deliveryreceive::all();
        return view('Delivery.wayplaning',compact('deliverorder'));
    }

    public function wayPlaningLists()
    {
        $wayplanningLists = Wayplanning::all();
        return view('Delivery.wayplaningList',compact('wayplanningLists'));
    }
    public function deliveryOrderReceiveStore(Request $request)
    {
        $request->validate([
            "customerphone" => "required",
            "pickup" =>  "required",
            "pickupaddress" =>  "required",
            "pick_charges" =>  "required",
            "contactn_at_pickup" =>  "required",
            "contactp_at_pickup" =>  "required",
            "destination_add" =>  "required",
            "destination_township" =>  "required",
            "deliverycharges" =>  "required",
            "nameDestination" =>  "required",
            "contactph" =>  "required",
            "package_type"=>"required",
            "dimension" => "required",
            "pick_delivery"=> "required",
            "qty"=>"required"
		]);

        $qty =explode(',',$request->qty,-1);
        $dimension =explode(',',$request->dimension,-1);
        $pick_delivery =explode(',',$request->pick_delivery,-1);
        $qty =explode(',',$request->qty,-1);
        $price =explode(',',$request->price,-1);

         $deliverorder = Deliveryreceive::create([
            "customer_name"=>$request->customername,
            "customer_phone"=>$request->customerphone,
            "pick_delivery"=>$request->pickup ,
            "pickup_address"=>$request->pickupaddress,
            "pickup_township_id"=>$request->pickuptownship,
            "pickup_charges"=>$request->pick_charges ,
            "contactname_at_pickup"=>$request->contactn_at_pickup,
            "contactphone_at_pickup"=>$request->contactp_at_pickup ,
            "destination_address"=>$request->destination_add,
            "township_id"=>$request->destination_township,
            "delivery_charges"=>$request->deliverycharges,
            "contactname_at_destination"=>$request->nameDestination,
            "contactphone_at_destination"=>$request->contactph,
        ]);

        $count = count($pick_delivery);
        for ($i=0; $i < $count; $i++) {
            $deliverorder->packagelists()->attach($pick_delivery[$i], ['dimension' => $dimension[$i],'pickup_delivery'=> $pick_delivery[$i],'qty'=> $qty[$i],'price'=>$price[$i]]);
        }
        alert()->success('Success!');
        return back();

    }
    public function wayplanningstore(Request $request)
    {
        $request->validate([
            "wayno" => "required",
            "delivery_id" => "required",
            "date" => "required",
            "pickup" => "required",
            "township_id" => "required",
            "start_time" => "required",
            "end_time" => "required",
		]);
        $wayplanning = Wayplanning::create([
            "wayno" => $request->wayno,
            "delivery_id" => $request->delivery_id,
            "date" => $request->date,
            "pick_delivery" => $request->pickup,
            "township_id" => $request->township_id,
            "start_time" => $request->start_time,
            "end_time" => $request->end_time,
        ]);
        alert()->success("Successfully created");
        return back();
    }
    public function getshopList(Request $request)
    {
        $request->session()->put('ShopOrWh','shop');
    	return view('Admin.shoplists');
    }
    public function SalePage(Request $request,$id)
    {
        $request->session()->put('from',$id);
        $request->session()->put('ShopOrWh','shop');

        $adminpass = User::find(1)->password;
        // dd($adminpass);
        $role= $request->session()->get('user')->role;
        if($role=='Sale_Person'){
            $item_from= $request->session()->get('user')->from_id;
      }
      else {
        $item_from= $request->session()->get('from');
      }
      $warehouses=From::where('id',$item_from)->orWhere('id',3)->orWhere('id',4)->orWhere('id',5)->get();

        $name= $request->session()->get('from');

        $froms=From::find($id);
//        dd($froms);
        $categories=[];
        $items = $froms->items()->with('category')->with('sub_category')->get();

        // foreach ($items as $item) {

        //     if (!isset($result[$item->category->id])){
        //         $result[$item->category->id] = $item->category;
        //     }
        // }
        // $categories = array_values($result);
        $categories = Category::all();
        $sub_categories = SubCategory::all();

        $employees = Employee::all();

        $date = new DateTime('Asia/Yangon');
        $customers = Customer::all();

        $today_date = strtotime($date->format('d-m-Y H:i'));
        $fItems =Item::with('category')->with('sub_category')->get();
        $salescustomers = SalesCustomer::all();
        $last_voucher = Voucher::get()->last();

        $voucher_code =  "VOU-".date('dmY')."-".sprintf("%04s", ($last_voucher->id + 1));


        // $today_date = $date->format('d-m-Y H:i');
        // dd($today_date);
    	return view('Sale.sale_page',compact('voucher_code','salescustomers','adminpass','fItems','warehouses','items','categories','employees','today_date','sub_categories','customers'));

    }
    public function storetestVoucher(Request $request)
    {
        // return $request;
        $validator = Validator::make($request->all(), [
            'item' => 'required',
            'grand' => 'required',
        ]);

        if ($validator->fails()) {

            return response()->json([
                'status' => 0,
                'message' => "No required fields",
            ]);
        }

        $user = session()->get('user');

         if($request->editvoucher != 0 ){
            $voucher = Voucher::findOrfail($request->editvoucher);
            //$units = Voucher::findOrfail($request->editvoucher)->counting_unit;
            foreach($voucher->counting_unit as $unit){

                $balanceQty = $unit->current_quantity + $unit->pivot->quantity;
                $unit->current_quantity = $balanceQty ;
                $unit->save();
                $voucher->counting_unit()->detach($unit->id);
            }
            $deleted = DB::table('vouchers')->where('id', $request->editvoucher)->delete();
        }

        try {


        // dd(json_decode(json_encode($request->grand)));


        $date = new DateTime('Asia/Yangon');

        $today_date = $date->format('d-m-Y h:i:s');

        $voucher_date = $date->format('Y-m-d');

        $today_time = $date->format('g:i A');

        $items = json_decode($request->item);

        $grand = json_decode($request->grand);

        $total_quantity = $grand->total_qty;

        // dd($total_quantity);
        $total_amount = $grand->sub_total ;

        $discount_type = $grand->total_discount_type;

        $discount_value = $grand->total_discount_value;

        $total_wif_discount = $total_amount - $discount_value;

        $remark = $request->remark;

        $voucher = Voucher::create([
            'sale_by' => $request->user_name,
            'voucher_code' => $request->voucher_code,
            'total_price' =>  $total_amount,
            'total_quantity' => $total_quantity,
            'voucher_date' => $voucher_date,
            'type' => 1,
            'status' => 0,
            'order_id' => 0,
            'sales_customer_id' => $request->customer_id ?? 0,
            'sales_customer_name' => $request->customer_name,
            'sales_customer_phone' => $request->customer_phone,
            'from_id'=> 1,
            'is_mobile' => 0,
            'is_print' => 0,
            'pay' => $request->cus_pay,
            'change' => (int)($request->cus_pay)- (int)($total_wif_discount),
            'discount_type' => $discount_type,
            'discount_value' => $discount_value,
            'sales_remark' => $remark,
        ]);

        if($request->customer_id != null && $request->customer_id != 0){
            $sale_customer = SalesCustomer::find($request->customer_id);
            $sale_customer->total_purchase_amount += $total_amount;
            $sale_customer->total_purchase_quantity += $total_quantity;
            $sale_customer->total_purchase_times += 1;
            $sale_customer->last_purchase_date = $voucher_date;
            $sale_customer->save();
        }

        foreach ($items as $item) {


            $voucher->counting_unit()->attach($item->id, ['quantity' => $item->order_qty,'price' => $item->selling_price,'discount_type' => $item->discount_type,'discount_value' => $item->discount_value]);

            $counting_unit = CountingUnit::find($item->id);
            $stock=$counting_unit->current_quantity;
            $balance_qty = ($stock - $item->order_qty);

            $counting_unit->current_quantity = $balance_qty;

            $counting_unit->save();

        }

        $last_voucher = Voucher::get()->last();
        if($last_voucher != null){
            $voucher_code =  "SVOU-" .date('y') . sprintf("%02s", (intval(date('m')) + 1)) .sprintf("%02s", ($last_voucher->id + 1));
        }else{
            $voucher_code =  "SVOU-" .date('y') . sprintf("%02s", (intval(date('m')) + 1)) .sprintf("%02s", 1);
        }
        $items = Item::where("category_id",1)->where("sub_category_id",2)->get();
        $item_ids=[];
        //$counting_units=[];
        foreach ($items as $item){
            array_push($item_ids,$item->id);
        }
            // return $voucher;
        //--Transaction


        // return $incoming;

        $FM = FinancialMaster::first();
        $accounting = Accounting::find($FM->showroom_sales_account_id);
        $accounting->balance += $total_amount;
        $accounting->save();
        // return $accounting;

        $incoming = FinancialIncoming::create([
            "initial_currency_id"=>$accounting->currency_id,
            'final_currency_id'=>$accounting->currency_id,
            'initial_amount'=>$total_amount,
            'final_amount'=>$total_amount,
            'amount' =>$total_amount,
            'remark' =>$remark,
             'date' => $voucher_date,
        ]);

        if($request->bank_acc == null)
        {
            $bc_acc = $request->cash_acc;

            $cash_account = Accounting::find($request->cash_acc);
            $cash_account->balance +=  $total_amount;
            $cash_account->save();
        }
        else if($request->cash_acc == null)
        {
            $bc_acc = $request->bank_acc;

            $bank_account =  Accounting::find($request->bank_acc);
            $bank_account->balance += $total_amount;
            $bank_account->save();

            $bank=Bank::where('account_id',$request->bank_acc)->first();
            $bank->balance += $total_amount;
            $bank->save();

            if($bank->old_bank_id != null)
            {
                $oldBank = BankAccount::find($bank->old_bank_id);
                $oldBank->balance +=  $total_amount;
                $oldBank->save();
            }

        }
        $tran1 = FinancialTransactions::create([
            'account_id' => $accounting->id,
            'type' => 2, // credit
            'amount' => $total_amount,
            'remark' => $remark,
            'date' =>$voucher_date,
            'type_flag' =>4, // income credit type
            'currency_id' =>$accounting->currency_id,
            'all_flag'  =>3,
            'incoming_flag' => 1,
            'incoming_id'=> $incoming->id
         ]);


            $tran = FinancialTransactions::create([
                'account_id' => $request->cash_acc == null ? $request->bank_acc : $request->cash_acc,
                'type' => 1, //  debit
                'amount' => $total_amount - $request->second_payment,
                'remark' => $remark,
                'date' => $voucher_date,
                'type_flag' =>3, // income debit type
                'incoming_flag' => 2,
                'currency_id' => $accounting->currency_id,
                'all_flag'  =>3,
                'incoming_id'=> $incoming->id
            ]);


        $tran1->related_transaction_id = $tran->id;
        $tran1->save();


    if($request->payment_type == 2)
    {

        try {
            if($request->bank_acc_second == null)
            {

                $cash_account_second = Accounting::find($request->cash_acc_second);
                $cash_account_second->balance += $request->second_payment;
                $cash_account_second->save();
            }
            else if($request->cash_acc_second == null )
             {

            $bank_account_second =  Accounting::find($request->bank_acc_second);
            $bank_account_second->balance += $request->second_payment;
            $bank_account_second->save();

            $bank_second=Bank::where('account_id',$request->bank_acc_second)->first();
            $bank_second->balance += $request->second_payment;
            $bank_second->save();

            if($bank_second->old_bank_id != null)
            {
                $oldBank_second = BankAccount::find($bank_second->old_bank_id);
                $oldBank_second->balance += $request->second_payment;
                $oldBank_second->save();
            }
             }


        $tran2 = FinancialTransactions::create([
            'account_id' => $request->cash_acc_second == null ? $request->bank_acc_second :$request->cash_acc_second ,
            'type' => 1, //  debit
            'amount' =>$request->second_payment,
            'remark' => $remark,
            'date' => $voucher_date,
            'type_flag' =>3, // income debit type
            'incoming_flag' => 2,
            'currency_id' => $accounting->currency_id,
            'all_flag'  =>3,
            'incoming_id'=> $incoming->id
        ]);
        $tran1->related_second_transaction_id = $tran2->id;
        $tran1->save();
        }
        catch(\Exception $e)
        {
            return $e;
      }

    }
        //End

        $counting_units = CountingUnit::whereIn('item_id',$item_ids)->with('fabric')->with('colour')->get();

        return response()->json([
            'status' => 1,
            'voucher'=>$voucher,
            'voucher_code' => $voucher_code,
            'counting_units' => $counting_units,
            'tran1'=>$tran1
        ]);

        } catch (\Exception $e) {

            return response()->json([
                'status' => 0,
                'message' => $e,
            ]);

        };




    }//Voucher Store End Method
    public function getItemA5(Request $request)
    {
        // dd($request->items);
        $items = json_decode(json_encode($request->items));
        // dd($items);
        return response()->json($items);
    }
}
