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

    protected $appends = ['unit_cost', 'total'];

    protected $defaultImage = 'img/default_product.png';

    /***********************
     * Appended attributes *
     ***********************/

    public function getTotalAttribute()
    {
        return $this->price + $this->iva;
    }

    public function getUnitCostAttribute()
    {
        return $this->total / $this->quantity;
    }

    /******************
     * Custom Methods *
     ******************/

    public function activate()
    {
        return $this->actives()
            ->syncWithoutDetaching([$this->productType->id]);
    }

    public function isActive()
    {
        return $this->actives()
            ->where('active_products.product_id', $this->id)
            ->exists();
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
