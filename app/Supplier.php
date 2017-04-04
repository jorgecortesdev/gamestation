<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Supplier extends Model
{
    use Presentable;

    protected $fillable = ['name', 'address', 'telephone', 'email', 'supplier_type_id'];

    protected $presenter = 'App\Presenters\SupplierPresenter';

    /*****************
     * Relationships *
     *****************/

    public function products()
    {
        return $this->hasMany(SupplierProduct::class)->with(['productType', 'unity']);
    }

    public function productTypes()
    {
        return $this->hasMany(ProductType::class);
    }

    public function type()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id');
    }
}
