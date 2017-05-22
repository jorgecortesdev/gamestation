<?php

namespace App;

use App\Traits\Imageable;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Product extends Model
{
    use Presentable, Imageable;

    protected $fillable = ['name', 'supplier_id', 'quantity', 'unity_id', 'price', 'iva', 'product_type_id'];

    protected $presenter = 'App\Presenters\ProductPresenter';

    protected $defaultImage = 'img/default_product.png';

    protected $appends = ['is_active'];

    protected $with = ['actives'];

    protected $hidden = ['actives'];

    /***********************
     * Appended attributes *
     ***********************/
    public function getIvaAttribute($iva)
    {
        return $iva ? ($this->total - ($this->total / 1.16)) : 0;
    }

    public function getTotalAttribute()
    {
        return $this->price * $this->quantity;
    }

    public function getPriceAttribute($price)
    {
        return $price / 100;
    }

    public function getIsActiveAttribute()
    {
         return $this->actives->isNotEmpty();
    }

    /******************
     * Custom Methods *
     ******************/

    public function activate()
    {
        return $this->actives()
            ->syncWithoutDetaching([$this->productType->id]);
    }

    public function path()
    {
        return route('products.show', [$this->id]);
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

    public function actives()
    {
        return $this->belongsToMany(ProductType::class, 'active_products');
    }
}
