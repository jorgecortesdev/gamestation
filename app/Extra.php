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
        $productTypes = \Cache::remember('extra-product-types', 60 * 5, function () {
            return $this->productTypes;
        });

        return $productTypes->sum(function ($productType) {
            $price = $productType->activeProduct
                ? $productType->activeProduct->price
                : 0;

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
            ->with('activeProduct');
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
}

