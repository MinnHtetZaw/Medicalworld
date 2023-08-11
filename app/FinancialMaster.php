<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialMaster extends Model
{
    use HasFactory;

    protected $fillable = [
        'financial_year_from',
        'financial_year_to',
        'showroom_sales_account_id',
        'b2b_sales_account_id',
        'purchase_account_id'
    ];

    public function showroom()
    {
        return $this->belongsTo(Accounting::class,'showroom_sales_account_id');
    }
    public function b2bSales()
    {
        return $this->belongsTo(Accounting::class,'b2b_sales_account_id');
    }
    public function purchaseAccount()
    {
        return $this->belongsTo(Accounting::class,'purchase_account_id');
    }

}
