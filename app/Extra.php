<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Extra extends Model
{
    use Presentable;

    protected $fillable = ['name', 'price'];

    protected $presenter = 'App\Presenters\ExtraPresenter';

    public function products()
    {
        return $this->belongsToMany(SupplierProduct::class)->withPivot('quantity')->with('unity');
    }

    public function getTotalAttribute()
    {
        return $this->products->sum(function ($product) {
            return $product->unit_cost * $product->pivot->quantity;
        });
    }

    public function getContributionMarginAttribute()
    {
        return $this->price - $this->total;
    }
}
