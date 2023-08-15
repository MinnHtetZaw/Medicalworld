<?php

namespace App\Http\Controllers;

use App\Cogs;
use App\Item;
use Illuminate\Http\Request;
use App\Http\Requests\CogsRequest;

class CogsController extends Controller
{
    public function getCogs(){
        $cogs = Cogs::where('delete_status',1)->get();
        $sale_items = Item::get();
        return view ('Admin.cogs_lists',compact('cogs','sale_items'));
    }//End method
    public function cogsCreate(Request $request){
        //  return $request;
        // $validated = $request->validated();
        // return $validated;
        $data =[
            'sale_product_id'=>$request->sale_product_id,
            'fabric_cost'=>$request->fabric_cost,
            'labor_cost'=>$request->labor_cost,
            'transportation_cost'=>$request->transportation_cost,
            'other_overhead_cost'=>$request->other_overhead_cost,
            'quantity'=>$request->quantity,


        ];
        $cogs = Cogs::create($data);
        return redirect()->route('cogs_caculator');
        
    }
}
