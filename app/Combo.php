<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Combo extends Model
{
    use Presentable;

    protected $fillable = ['name', 'hours', 'kids', 'adults', 'price', 'google_color_id'];

    protected $presenter = 'App\Presenters\ComboPresenter';

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

    public function getUtilityAttribute()
    {
        return $this->price / $this->contribution_margin;
    }

    public function productTotal($product_id)
    {
        $product = $this->products()->where('supplier_products.id', $product_id)->first();
        return $product->unit_cost * $product->pivot->quantity;
    }
}
