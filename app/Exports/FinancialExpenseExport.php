<?php

namespace App\Exports;

use App\Design;
use App\FinancialExpense;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\FromCollection;

class FinancialExpenseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FinancialExpense::select('financial_expenses.date','financial_expenses.initial_currency_id','financial_expenses.final_currency_id','financial_expenses.initial_amount','financial_expenses.final_amount',
        'financial_expenses.remark','financial_transactions.amount','financial_transactions.type',
        DB::raw('CASE WHEN financial_transactions.type = 1 THEN "Debit" ELSE "Credit" END as type'))
                      ->leftJoin('financial_transactions','financial_transactions.account_id','financial_expenses.id')
                         ->get();
    }
}
