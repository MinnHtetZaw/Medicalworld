<?php

namespace App\Http\Controllers;

use App\Cogs;
use App\Item;
use App\CountingUnit;
use Illuminate\Http\Request;
use App\Http\Requests\CogsRequest;

class CogsController extends Controller
{
    public function getCogs(){
        // $count_units =CountUnits::where()
        $cogs = Cogs::where('delete_status',1)->get();
        $sale_items = Item::get();
        return view ('Admin.cogs_lists',compact('cogs','sale_items'));
    }//End method

    //Create Section
    public function cogsCreate(Request $request){
      
       $data= $this->reqData($request);
        $cogs = Cogs::create($data);
       
        return redirect()->route('cogs_caculator');
        
    }//End Method
//Update Section
        public function cogsUpdate(Request $request){
            $cogsId = $request->id;
            $data= $this->reqData($request);
            // return $cogsId;
            $cogs = Cogs::where('id',$cogsId)->update($data);
            return redirect()->route('cogs_caculator');
        }//End method

        //Delete Section
        public function cogsDelete($id){
            // return $id;
            $cogs = Cogs::find($id);
            if($cogs){
                $cogs->delete_status =0;
              
                  
                    if($cogs->save()){
                        return redirect()->back();
                    };
            }
        }//End method

        public function countUnitGet($sale_product_id){
            $data = CountingUnit::where('item_id',$sale_product_id)->get();
            return back();
            
        }

    private function reqData(Request $request){
        return(
            $data =[
            'sale_product_id'=>$request->sale_product_id,
            'fabric_cost'=>$request->fabric_cost,
            'labor_cost'=>$request->labor_cost,
            'transportation_cost'=>$request->transportation_cost,
            'other_overhead_cost'=>$request->other_overhead_cost,
            'quantity'=>$request->quantity,
            ]);
    }
}
