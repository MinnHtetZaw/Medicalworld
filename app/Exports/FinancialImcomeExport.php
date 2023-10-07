<?php

namespace App\Exports;

use App\Design;
use App\FinancialIncoming;
use Maatwebsite\Excel\Concerns\FromCollection;

class FinancialImcomeExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FinancialIncoming::all();
    }
}
