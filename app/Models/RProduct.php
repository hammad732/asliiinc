<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Model;

class RProduct extends Model
{
    protected $guarded = [];

    public function getSubCat()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id');
    }
    public function getCat()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    public function variant()
    {
        return $this->hasMany(PVariant::class);
    }
}
