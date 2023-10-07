<?php

namespace App\Exports;

use App\Design;
use App\FinancialExpense;
use Maatwebsite\Excel\Concerns\FromCollection;

class FinancialExpenseExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FinancialExpense::all();
    }
}
