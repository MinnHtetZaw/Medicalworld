<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialAccountingType extends Model
{
    use HasFactory;
    protected $guarded = [];

    protected $fillable = [
        'type_name',
        'description'
    ];//by zii
}
