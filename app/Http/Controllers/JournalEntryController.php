<?php

namespace App\Http\Controllers;

use App\Accounting;
use App\SubHeading;
use App\HeadingType;
use App\JournalEntry;
use Illuminate\Http\Request;
use App\FinancialTransactions;

class JournalEntryController extends Controller
{
    //Get list
    public function getEntryList()
    {
        $account = Accounting::all();
        $subheadings = SubHeading::all();
        $headings= HeadingType::all();

        $entries = JournalEntry::with('relatedEntry','relatedEntry.toAccount')->whereNull('related_entry_id')->get();
        // dd($entries->relatedEntry->toArray());
        return view("Admin.journalentrylist",compact('entries','account','subheadings','headings'));
    }//End method
    //Filter by date
    public function ajaxTransactionFilter(Request $request){


        $from = $request->from;
        $to = $request->to;

        $date_filter = FinancialTransactions::whereBetween('date',[$from,$to])->with('accounting')->get();

        return response()->json([
            'date_filter' => $date_filter
       ]);
    }//End method
}
