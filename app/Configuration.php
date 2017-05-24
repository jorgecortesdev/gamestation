<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Configuration extends Model
{
    use Presentable;

    protected $fillable = ['event_id', 'configurable_id', 'configurable_type', 'product_type_id', 'product_id', 'custom'];

    protected $presenter = 'App\Presenters\ConfigurationPresenter';

    public $timestamps = false;

    /**
     * Relationships
     */
    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function configurable()
    {
        return $this->hasOne(Configurable::class, 'configuration_id');
    }

    public function combos()
    {
        return $this->morphedByMany(Combo::class, 'configurable');
    }

    public function extras()
    {
        return $this->morphedByMany(Extra::class, 'configurable');
    }

    public function events()
    {
        return $this->belongsTo(Event::class);
    }

    /**
     * Custom methods
     */
    public function type()
    {
        $reflection = new \ReflectionClass(
            $this->configurable_type
        );
        return strtolower($reflection->getShortName());
    }

    public function options()
    {
        $products = $this->productType->products;
        $activeProduct = $products->where('is_active', true)->first();
        return $products->filter(function ($product) use ($activeProduct) {
            return $product->id != $activeProduct->id && $product->supplier_id == $activeProduct->supplier_id;
        });
    }
}
