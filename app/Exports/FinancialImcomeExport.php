<?php

namespace App\Exports;

use App\Design;
use App\FinancialIncoming;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class FinancialImcomeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FinancialIncoming::select('financial_incomings.date','financial_incomings.initial_currency_id','financial_incomings.final_currency_id','financial_incomings.initial_amount','financial_incomings.final_amount',
        'financial_incomings.remark','financial_transactions.amount','financial_transactions.type',
        DB::raw('CASE WHEN financial_transactions.type = 1 THEN "Debit" ELSE "Credit" END as type'))
                      ->leftJoin('financial_transactions','financial_transactions.account_id','financial_incomings.id')
                         ->get();

    
    }
}
