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
            $unitCost = $productType->activeProduct()->unit_cost;
            $quantity = $productType->quantity * $productType->pivot->quantity;
            return  $unitCost * $quantity;
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
            ->withPivot('quantity');
    }

    public function configurables()
    {
        return $this->productTypes()->where('configurable', true);
    }

    public function configurations()
    {
        return $this->morphToMany(Configuration::class, 'configurable');
    }

    public function events()
    {
        return $this->belongsToMany(Event::class)->withPivot('quantity');
    }
}
