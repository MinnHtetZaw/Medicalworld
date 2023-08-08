<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialIncoming extends Model
{
    use HasFactory;
    protected $fillable = [

        'type','date','remark','amount'
    ];
}
