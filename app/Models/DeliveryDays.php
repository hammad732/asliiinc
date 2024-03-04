<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Days;

class DeliveryDays extends Model
{
    protected $guarded = [];
    
    public function days(){
        return $this->belongsTo(days::class, 'days_id');
    }
}
