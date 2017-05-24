<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Extra extends Model
{
    use Presentable;

    protected $fillable = ['name', 'price'];

    protected $presenter = 'App\Presenters\ExtraPresenter';

    protected $appends = ['total', 'contribution_margin', 'utility'];

    /***********************
     * Appended attributes *
     ***********************/

    public function getTotalAttribute()
    {
        return $this->productTypes->sum(function ($productType) {
            $price = $productType->product->first()->price;
            $quantity = $productType->quantity * $productType->pivot->quantity;
            return  $price * $quantity;
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

    /*****************
     * Relationships *
     *****************/

    public function productTypes()
    {
        return $this->morphToMany(ProductType::class, 'product_typeable')
            ->withPivot('quantity')
            ->with('product');
    }

    public function configurations()
    {
        return $this->morphToMany(
            Configuration::class, 'configurable', 'configurations', 'configurable_id', 'event_id'
        );
    }

    public function configurables()
    {
        return $this->productTypes()->where('configurable', true);
    }

    public function events()
    {
        return $this->belongsToMany(Event::class)->withPivot('quantity');
    }

    /******************
     * Custom Methods *
     ******************/

    public function products()
    {
        return \App\Product::selectRaw('products.*')
            ->join('active_products', 'products.id', 'active_products.product_id')
            ->join('product_typeables', 'products.product_type_id', 'product_typeables.product_type_id')
            ->where([
                ['product_typeable_id', '=', $this->id],
                ['product_typeable_type', '=', get_class($this)]
            ]);
    }
}

