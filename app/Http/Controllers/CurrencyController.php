<?php

namespace App\Http\Controllers;

use App\Currency;
use Illuminate\Http\Request;

class CurrencyController extends Controller
{
    //
    public function currency(){
        $currency = Currency::all();
        return view('Admin.currency',compact('currency'));
    }
    //Create Currency
    public function store_currency(Request $request){
    //    return $request;
        Currency::create([
            'code' => $request->code,
            'name' => $request->name,
            'exchange_rate' => $request->rate,
            'last_update' => $request->last,
        ]);
      alert()->success('Added Currency Successfully!!!');
        return redirect()->back();
    }//End Method

    //Update Currency
    public function update_currency(Request $request,$id){
       
        $curr = Currency::find($id);

        $curr->exchange_rate = $request->rate;
        $curr->save();
        alert()->success('Updated Exchange Rate Successfully!!!');
        return redirect()->back();
    }
}
