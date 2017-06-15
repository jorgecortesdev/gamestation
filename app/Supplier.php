<?php

namespace App;

use GameStation\Traits\HasImage;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;
use Laravel\Scout\Searchable;

class Supplier extends Model
{
    use Presentable, HasImage;

    protected $fillable = ['name', 'address', 'telephone', 'email', 'image'];

    protected $presenter = 'App\Presenters\SupplierPresenter';

    protected $defaultImage = 'images/default_supplier.png';

    /******************
     * Custom Methods *
     ******************/

    public function activeProductTypes()
    {
        return $this->products()
            ->get()
            ->where('is_active', true)
            ->map(function ($product) {
                return $product->productType;
            });
    }

    public function productsSortByActive($order = null)
    {
        $method = 'sortBy';

        if ( ! is_null($order) ) {
            $method = 'sortByDesc';
        }

        return $this->products->{$method}(function ($product) {
            return $product->is_active;
        });
    }

    public function path()
    {
        return route('suppliers.show', [$this->id]);
    }

    public function addProduct($product)
    {
        $this->products()->create($product);
    }

    /*****************
     * Relationships *
     *****************/

    public function products()
    {
        return $this->hasMany(Product::class)->with(['productType', 'unity']);
    }
}
