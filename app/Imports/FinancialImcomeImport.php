<?php

namespace App\Imports;

use App\Item;
use App\Size;
use App\Colour;
use App\Design;
use App\Fabric;
use App\Gender;
use App\Currency;
use App\SubCategory;
use App\FabricCosting;
use App\FinancialIncoming;
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

            $initialCurrency = Currency::where('id','Like','%'.$row['initial_currency_id'].'%')->first();
            $finalCurrency = Currency::where('id','Like','%'.$row['final_currency_id'].'%')->first();


            // dd($initialCurrency);
           
            // $fabric = Fabric::where('fabric_name','Like','%'.$row['fabric'].'%')->first();

            // $color = Colour::where('colour_name','Like','%'.$row['color'].'%')->first();
            // $size = Size::where('size_name','Like','%'.$row['size'].'%')->first();
            // $subcategory = SubCategory::where('subcategory_code','Like','%'.$row['subcategory_code'].'%')->first();
            // $gender = Gender::whereIn('gender_name',['M/F','un'],'Like','%'.$row['gender'].'%')->first();

            if($initialCurrency && $finalCurrency && $row['date']  && $row['initial_amount'] && $row['final_amount'] && $row['amount'] && $row['remark'])
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
                 
            }
        }
    }
}

