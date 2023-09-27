<?php

namespace App\Http\Controllers;

use App\Expense;
use App\Accounting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SoplController extends Controller
{
    public function getExportList(){

        // $accountLists = Accounting::with(['transactions' => function ($query) {
        //     $query->select('account_id', DB::raw('SUM(amount) as amount'))
        //           ->groupBy('account_id');
        // }])->get();
        // $openingInventory = Expense::where('description','Factory Disel')->get();

        //  return $openingInventory;
        $accountLists = Accounting::whereIn('subheading_id', [10, 26])->get();
        // return $accountLists;
        $totalRevenueAmount = Accounting::whereIn('subheading_id', [10, 26])->sum('balance');
        $costofSaleList = Accounting::where('subheading_id','11')->get();
        $costofSaleAmount = Accounting::where('subheading_id','11')->sum('balance');
        $grossProfit= $totalRevenueAmount-  $costofSaleAmount;
        $marketingExpLists = Accounting::where('subheading_id','14')->get();
        $marketingExpAmount = Accounting::where('subheading_id','14')->sum('balance');
        $administrativeExpenseList= Accounting::where('subheading_id','13')->get();
        $AdministrativeExpAmount = Accounting::where('subheading_id','13')->sum('balance');
        $financialExpLists= Accounting::whereIn('subheading_id',['7','19'])->get();
        $financialExpAmount = Accounting::where('subheading_id',['7','19'])->sum('balance');
        $depreciationExpLists= Accounting::where('subheading_id','15')->get();
        $depreciationExpAmount = Accounting::where('subheading_id','15')->sum('balance');
        $taxExpLists= Accounting::where('subheading_id','16')->get();
        $taxExpAmount = Accounting::where('subheading_id','16')->sum('balance');
        $otherExpLists= Accounting::where('subheading_id','27')->get();
        $otherExpAmount = Accounting::where('subheading_id','27')->sum('balance');
        $totalAllExpAmount =$marketingExpAmount+$AdministrativeExpAmount+$financialExpAmount+$depreciationExpAmount+$otherExpAmount;
        $EBTA=$grossProfit-$totalAllExpAmount;
        $netProfit=$EBTA-$taxExpAmount;
        return view('Admin.Report.sopl',compact('accountLists','totalRevenueAmount','costofSaleList','costofSaleAmount',
        'grossProfit','marketingExpLists','marketingExpAmount','administrativeExpenseList','AdministrativeExpAmount',
    'financialExpLists','financialExpAmount','depreciationExpLists','depreciationExpAmount','taxExpLists','taxExpAmount',
'otherExpLists','otherExpAmount','totalAllExpAmount','EBTA','netProfit'));
    }
}
