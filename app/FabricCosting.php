<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class FabricCosting extends Model
{
    use HasFactory;

    // protected $with = ['subtotal'];

    protected $fillable = [
            'design_id',
            'fabric_id',
            'color_id',
            'size_id',
            'yards',
            'pricing'
    ];

    public function subtotal()
    {
        return $this->yards * $this->pricing;
    }

    public function design():BelongsTo
    {
        return $this->belongsTo(Design::class);
    }
    public function fabric():BelongsTo
    {
        return $this->belongsTo(Fabric::class);
    }

    public function size():BelongsTo
    {
        return $this->belongsTo(Size::class);
    }

    public function color():BelongsTo
    {
        return $this->belongsTo(Colour::class);
    }


}
