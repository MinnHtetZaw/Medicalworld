<?php

namespace App\Imports;

use App\Item;
use App\Size;
use App\Colour;
use App\Design;
use App\Fabric;
use App\Gender;
use App\Currency;
use App\Accounting;
use App\SubCategory;
use App\FabricCosting;
use App\FinancialIncoming;
use App\FinancialTransactions;
use Illuminate\Support\Collection;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class FinancialImcomeImport implements ToCollection,WithHeadingRow
{
    public function collection(Collection $rows)
    {

        foreach($rows as $row)
        {
            // dd($row->toArray());
           //code by z
            $initialCurrency = Currency::where('id','Like','%'.$row['initial_currency_id'].'%')->first();
            $finalCurrency = Currency::where('id','Like','%'.$row['final_currency_id'].'%')->first();

            if($initialCurrency && $finalCurrency && $row['date']  && $row['initial_amount'] && $row['final_amount'] && $row['amount'] && $row['remark']
             && $row['income_account_id'] && $row['incoming_flag'] && $row['bank_cash_account_id'] )
            {
                FinancialIncoming::create([
                    'date' =>$row['date'],
                    'initial_currency_id' =>$initialCurrency->id,
                    'final_currency_id' =>$finalCurrency->id,
                    'initial_amount'=>$row['initial_amount'],
                    'final_amount'=>$row['final_amount'],
                    'amount'=>$row['amount'],
                    'remark'=>$row['remark']
                    

                 ]);
                 FinancialTransactions::create([
                    // 2
                    'account_id'=>$row['income_account_id'],
                    'incoming_flag'=>$row['incoming_flag'],
                    'amount'=>$row['amount'],
                    'date' =>$row['date'],
                    'remark'=>$row['remark'],
                    'type'=>$row['bank_cash_account_id'],

                    
                 ]);
                 
            }
        }
    }
}

