<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class SupplierProduct extends Model
{
    use Presentable;

    protected $fillable = ['name', 'supplier_id', 'quantity', 'unity_id', 'price', 'iva', 'product_type_id'];

    protected $presenter = 'App\Presenters\SupplierProductPresenter';

    public function getTotalAttribute()
    {
        return $this->price + $this->iva;
    }

    public function getUnitCostAttribute()
    {
        return $this->total / $this->quantity;
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }
}
