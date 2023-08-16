<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cogs extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function saleitem(){
        return $this->belongsTo(Item::class,'sale_product_id');
    }
}
