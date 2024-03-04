<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Distributororderinfo extends Model
{
    protected $guarded = [];

    public function get_dorder()
    {
        return $this->belongsTo(Distributororder::class, 'distributororders_id');
    }

    public function get_dproducts()
    {
        return $this->belongsTo(DProduct::class, 'dproduct_id');
    }

}
