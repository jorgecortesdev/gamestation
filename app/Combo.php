<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Combo extends Model
{
    use Presentable;

    protected $fillable = ['name', 'hours', 'kids', 'adults', 'price', 'color_id'];

    protected $presenter = 'App\Presenters\ComboPresenter';

    protected $appends = ['total', 'contribution_margin', 'utility'];

    public function configurableProductTypes()
    {
        return $this->productTypes()->where('configurable', true);
    }

    /***********************
     * Appended attributes *
     ***********************/

    public function getTotalAttribute()
    {
        $productTypes = \Cache::remember('combo-product-types', 60 * 1, function () {
            return $this->productTypes;
        });

        return $productTypes->sum(function ($productType) {
            $price = $productType->activeProduct
                ? $productType->activeProduct->price
                : 0;
            $quantity = $productType->pivot->quantity;

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
        return $this->morphMany(Configuration::class, 'configurable');
    }

    public function configurables()
    {
        return $this->productTypes()->where('configurable', true);
    }

    public function properties()
    {
        return $this->belongsToMany(Property::class);
    }

    public function events()
    {
        return $this->hasMany(Event::class);
    }

    /***************
     * Form Values *
     ***************/

    public function getFormValue($name)
    {
        if (empty($name)) {
            return null;
        }

        switch ($name) {
            case 'properties':
                return $this->properties->pluck('id')->toArray();
                break;
        }

        return $this->getAttribute($name);
    }
}
