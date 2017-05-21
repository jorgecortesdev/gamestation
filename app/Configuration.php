<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Configuration extends Model
{
    use Presentable;

    protected $fillable = ['event_id', 'configurable_id', 'configurable_type', 'product_type_id', 'product_id', 'custom'];

    protected $presenter = 'App\Presenters\ConfigurationPresenter';

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
        return $this->productType->products->filter(function ($product) {
            return $product->is_active != true;
        });
    }
}
