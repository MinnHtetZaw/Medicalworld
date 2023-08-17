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
        // dd($request->toArray());

        $count_unit_purchase = CountingUnit::where('id',$request->count_unit_id)->update([
            'order_price'=>$request->selling_price,
            'purchase_price'=>$request->cost_per_unit
        ]);
       $data= $this->reqData($request);
        $cogs = Cogs::create($data);
       
        return redirect()->route('cogs_caculator');
        
    }//End Method
//Update Section
        public function cogsUpdate(Request $request){
                    dd($request->toArray());

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

        public function countUnitGet(Request $request){
            // $selectedItems = $request->input('count_unit_id');
            $data = CountingUnit::where('item_id',$request->sale_product_id)->get();
            return response()->json($data);
        }

    private function reqData(Request $request){

        // dd($request->toArray());
        if($request->count_unit_id){
            $count_unit_id = $request->count_unit_id;
            // return $count_unit_id;
         $data = [];
         for($i=0;$i<count($count_unit_id);$i++){
             array_push($data,$count_unit_id[$i]);
        
        
         }
        //  return $data;
         $countUnitData = implode (",",$data);
        };
      
        return(
            $data =[
            'sale_product_id'=>$request->sale_product_id,
            'fabric_cost'=>$request->fabric_cost,
            'labor_cost'=>$request->labor_cost,
            'transportation_cost'=>$request->transportation_cost,
            'other_overhead_cost'=>$request->other_overhead_cost,
            'accessory_cost'=>$request->accessory_cost,
            'packaging_cost'=>$request->packaging_cost,
            'fabric_qty'=>$request->fabric_qty,
            
            'selling_price'=>$request->selling_price,
            'count_unit_id'=>$countUnitData,
            'cost_per_unit'=>$request->cost_per_unit,
            'quantity'=>$request->quantity,
            ]);
    }//End method
}
