<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialIncoming extends Model
{
    use HasFactory;
    protected $fillable = [

        'date',
        'remark',
        'amount',
        'initial_currency_id',
        'final_currency_id',
        'initial_amount',
        'final_amount'
    ];
}
