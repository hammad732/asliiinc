<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\DeliveryDays;

class Store extends Model
{
    protected $guarded = [];
    
    public function devlivery_days()
    {
        return $this->hasMany(DeliveryDays::class, 'store_id');
    }
}
