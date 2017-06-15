<?php

namespace App;

use GameStation\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Product extends Model
{
    use Presentable, HasImage;

    protected $fillable = ['name', 'quantity', 'unity_id', 'price', 'iva', 'product_type_id', 'image'];

    protected $presenter = 'App\Presenters\ProductPresenter';

    protected $defaultImage = 'images/default_product.png';

    protected $appends = ['is_active'];

    protected $with = ['productType'];

    protected static function boot()
    {
        parent::boot();

        static::updating(function ($product) {

            if (array_key_exists('product_type_id', $product->getDirty())) {
                $product->deactivate();
            }

        });
    }

    /*************
     * Accessors *
     *************/
    public function getIvaAttribute($iva)
    {
        return $iva ? ($this->price - ($this->price / 1.16)) : 0;
    }

    public function getUnitPriceAttribute()
    {
        return $this->price / $this->quantity;
    }

    public function getPriceAttribute($price)
    {
        return $price / 100;
    }

    public function getIsActiveAttribute()
    {
         return $this->productType->product_id == $this->id;
    }

    /************
     * Mutators *
     ************/

    public function setPriceAttribute($value)
    {
        $this->attributes['price'] = $value * 100;
    }

    public function setIvaAttribute($value)
    {
        $this->attributes['iva'] = (bool) $value;
    }

    /******************
     * Custom Methods *
     ******************/

    public function activate()
    {
        $this->productType->update(['product_id' => $this->id]);

        return $this;
    }

    public function deactivate()
    {
        $this->productType->update(['product_id' => null]);

        return $this;
    }

    public function path()
    {
        return route('suppliers.products.show', [$this->supplier->id, $this->id]);
    }

    /*****************
     * Relationships *
     *****************/

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function productType()
    {
        return $this->belongsTo(ProductType::class);
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }
}
