<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class ProductType extends Model
{
    use Presentable;

    protected $fillable = ['name', 'supplier_product_id', 'configurable'];

    protected $presenter = 'App\Presenters\ProductTypePresenter';

    /*****************
     * Relationships *
     *****************/

    public function supplierProducts()
    {
        return $this->hasMany(SupplierProduct::class, 'product_type_id') ;
    }

    public function supplierProduct()
    {
        return $this->belongsTo(SupplierProduct::class);
    }
}
