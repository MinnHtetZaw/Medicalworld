<?php

namespace App\Exports;

use App\Item;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ItemExport implements FromCollection,WithHeadings
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        return Item::all();
    }
   
    
    public function headings():array{
     
        return [
            'No.',
            'item_code',
            'item_name',
            'created_by',
            'customer_console',
            'photo_path',
            'description',
            'category_id',
            'sub_category_id',
            'deleted_at',
            'created_at',
            'updated_at',
            'unit_name',
            'instock',
            'preorder',
            'arrival_date',
            'discount_price',
            'new_product_flag',
            'promotion_product_flag',
            'hot_sale_flag',
            'related_item_id',
            


        ];
        
    }
}
