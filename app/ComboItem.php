<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class ComboItem extends Model
{
    use Presentable;

    protected $presenter = 'App\Presenters\ComboItemPresenter';

    public function product()
    {
        return $this->hasOne(SupplierProduct::class, 'id', 'supplier_product_id');
    }
}
