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
            $unitCost = $productType->supplierProduct->unit_cost;
            $quantity = $productType->pivot->quantity;
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
        return $this->belongsToMany(ProductType::class)
            ->withPivot('quantity')
            ->with('supplierProduct.unity');
    }

}
