<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProductType extends Model
{
    protected $fillable = ['name'];

    public function supplierProducts()
    {
        return $this->hasMany(SupplierProduct::class, 'product_type_id');
    }
}
