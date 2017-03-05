<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Product extends Model
{

    use Presentable;

    protected $fillable = ['name', 'price', 'product_type_id'];

    protected $presenter = 'App\Presenters\SupplierProductPresenter';

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }
}
