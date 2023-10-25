<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Accounting;
use Illuminate\Http\Request;

class SofbController extends Controller
{
    public function getExportList(){

        return view('Admin.Report.sofb');
    }
     public function filterDateAmount(Request $request){
        // return $request;
     
        $requestDate = Carbon::parse($request->dateCount);
        $formattedDate = $requestDate->format('Y-m-d H:i:s');
        // return $requestDate;
       
      
    $date_filter = Accounting::whereDate('created_at',$formattedDate)->get();
    return response()->json([
        'date_filter' => $date_filter
   ]);

     

     }
    
}
