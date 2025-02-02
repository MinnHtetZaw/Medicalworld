<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FinancialPurchase extends Model
{
    use HasFactory;

    protected $fillable = [
        'purchase_number',
    	'supplier_name',
		'total_quantity',
		'total_price',
		'purchase_date',
        'type_flag',
		'purchase_by',
        'credit_amount',
		'supplier_id',
		'purchase_remark',
	];


	public function factory_item() {
		return $this->belongsToMany('App\FactoryItem')->withPivot('id','quantity','price','arrive_quantity','remaining_amount','arrive_complete');
	}

	public function user(){
        return $this->belongsTo('App\User','purchase_by');
    }
	public function supplier(){
        return $this->belongsTo('App\Supplier','supplier_id');
    }

    public function supplier_credit_list(){
        return $this->hasOne('App\SupplierCreditList');
    }
}
