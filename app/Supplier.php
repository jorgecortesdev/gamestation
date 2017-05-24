<?php

namespace App;

use App\Traits\Imageable;
use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Supplier extends Model
{
    use Presentable, Searchable, Imageable;

    protected $fillable = ['name', 'address', 'telephone', 'email', 'supplier_type_id'];

    protected $presenter = 'App\Presenters\SupplierPresenter';

    protected $defaultImage = 'img/default_supplier.png';

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
        return route('supplier.show', [$this->id]);
    }

    /*****************
     * Relationships *
     *****************/

    public function products()
    {
        return $this->hasMany(Product::class)->with(['productType', 'unity']);
    }

    public function type()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id');
    }
}
