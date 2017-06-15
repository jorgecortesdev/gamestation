<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class ProductType extends Model
{
    use Presentable;

    protected $fillable = ['name', 'quantity', 'configurable', 'customizable', 'product_id'];

    protected $presenter = 'App\Presenters\ProductTypePresenter';

    /*****************
     * Relationships *
     *****************/

    public function products()
    {
        return $this->hasMany(Product::class, 'product_type_id') ;
    }

    public function activeProduct()
    {
        return $this->belongsTo(Product::class, 'product_id');
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'product_typeable');
    }

    public function extras()
    {
        return $this->morphedByMany(Extra::class, 'product_typeable');
    }

    public function hasActiveProduct()
    {
        return $this->product_id !== null;
    }
}
