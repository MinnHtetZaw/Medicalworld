<?php

namespace App\Exports;

use App\Design;
use App\FinancialIncoming;
use App\FinancialTransactions;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;


class FinancialImcomeExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return FinancialTransactions::select('accountings.account_name as Account Name','financial_transactions.date','currencies.name as Currency',
        'financial_transactions.remark','financial_transactions.amount','financial_transactions.type'  
       
       )
                      ->leftJoin('financial_incomings','financial_transactions.incoming_id','financial_transactions.id')
                      ->leftJoin('currencies', 'currencies.id', 'financial_transactions.currency_id')  
                      ->leftJoin('accountings','accountings.id','financial_transactions.account_id')
                     ->whereNotNull('financial_transactions.incoming_id')
                     ->whereIn('financial_transactions.type', [1, 2]) 
                      ->get();
      
    
    }
    public function headings(): array
    {

        return [
            "Account Name",
            'Date',
            'Currency',
           
            // 'Initial Amount',
            // 'Final Amount',
            'remark',
            'Financial Transaction Amount',
            'Transaction Type'
        ];
    }
}
