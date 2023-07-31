<?php

namespace App;

use App\FactoryPo;
use Illuminate\Database\Eloquent\Model;

class Purchase extends Model
{
    protected $guarded = [];

    protected $fillable = [
        'purchase_number',
    	'supplier_name',
		'total_quantity',
		'total_price',
		'purchase_date',
		'purchase_by',
        'credit_amount',
		'supplier_id',
		'purchase_remark',
		'purchase_type',
        'adjustment_flag',
        'factory_po_id',
        'factory_po_number'
	];

	public function counting_unit() {
		return $this->belongsToMany('App\CountingUnit')->withPivot('id','quantity','price');
	}

	public function factory_item() {
		return $this->belongsToMany('App\FactoryItem')->withPivot('id','quantity','price','remaining_amount','arrive_quantity','arrive_complete');
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

    public function po()
    {
        return $this->belongsTo(FactoryPo::class);
    }
}
