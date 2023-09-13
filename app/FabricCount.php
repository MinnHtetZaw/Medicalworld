<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FabricCount extends Model
{
    protected $fillable= ['factory_item_id','factory_item_name','count_date','open_stock','in_stock','out_stock','close_stock','remark'];
    // public function fabric_entry_item()
    // {
    //     return $this->belongsTo(FabricEntryItem::class,'factory_item_id');
    // }
}
