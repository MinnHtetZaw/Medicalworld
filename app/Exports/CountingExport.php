<?php

namespace App\Exports;

use App\Item;
use App\CountingUnit;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\FromCollection;

class CountingExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return CountingUnit::orderBy('unit_name', 'asc')->get();
    }
   
    
    public function headings():array{
     
        return [
        'No.',
        'unit_code',
    	'original_code',
		'unit_name',
		'current_quantity',
		'reorder_quantity',
		'normal_sale_price',
		'whole_sale_price',
		'order_price',
		'purchase_price',
		'item_id',
		'normal_fixed_flash',
		'normal_fixed_percent',
		'whole_fixed_flash',
		'whole_fixed_percent',
		'order_fixed_flash',
		'order_fixed_percent',
        'design_id',
        'fabric_id',
        'colour_id',
        'size_id',
        'gender_id',


        ];
        
    }
}
