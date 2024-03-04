<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Retailerorderinfo extends Model
{
    protected $guarded = [];

    public function get_rorder()
    {
        return $this->belongsTo(Retailerorder::class, 'id');
    }

    public function get_rproducts()
    {
        return $this->belongsTo(RProduct::class, 'rproduct_id');
    }
}
