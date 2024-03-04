<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;
class Distributororder extends Model
{
    protected $guarded = [];

    public function get_dinfo()
    {
        return $this->hasMany(Distributororderinfo::class, 'distributororders_id');
    }
    public function get_user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function get_dshipping()
    {
        return $this->hasMany(Distributorordershipping::class, 'distributororders_id');
    }
}
