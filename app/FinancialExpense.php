<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialExpense extends Model
{
    use HasFactory;
     //
     protected $fillable = [
        'purchase_id',
        'date',
        'remark',
        'amount',
        'initial_currency_id',
        'final_currency_id',
        'initial_amount',
        'final_amount'
];

public function purchase()
{
return $this->belongsTo(Purchase::class,'purchase_id');
}
}
