<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\RProduct;

class PVariant extends Model
{
    //
    // protected $guarded = [];
    protected $fillable = ['price', 'unit', 'weight'];



    public function rproduct()
    {
        return $this->belongsTo(RProduct::class);
    }

}