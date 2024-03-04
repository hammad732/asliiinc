<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    protected $guarded = [];

    public function getCat()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
