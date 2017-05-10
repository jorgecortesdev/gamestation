<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ActiveProduct extends Model
{
    public function products()
    {
        return $this->belongsToMany(Product::class);
    }

    public function productTypes()
    {
        return $this->belongsToMany(ProductType::class);
    }
}
