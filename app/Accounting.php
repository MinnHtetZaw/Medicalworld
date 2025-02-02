<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Accounting extends Model
{
    use HasFactory;

    protected $fillable = [
        'account_code',
        'account_name',
        'subheading_id',
        'balance',
        'nature',
        'currency_id',

    ];

    public function subheading(){
    	return $this->belongsTo(SubHeading::class,'subheading_id');
    }

    public function currency(){
    	return $this->belongsTo('App\Currency','currency_id');
    }
    public function financial_transaction(){
		return $this->belongsTo(FinancialTransactions::class,'account_id');
	}
    public function transactions()
    {
        return $this->hasMany(FinancialTransactions::class,'account_id');
    }
}
