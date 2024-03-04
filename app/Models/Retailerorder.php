<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Retailerorder extends Model
{
    protected $guarded = [];

    public function get_rinfo()
    {
        return $this->hasMany(Retailerorderinfo::class, 'retailerorders_id');
    }
    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function get_rshipping()
    {
        return $this->hasMany(Retailerordershipping::class, 'retailerorders_id');
    }
}
