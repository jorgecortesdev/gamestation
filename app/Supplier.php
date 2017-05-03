<?php

namespace App;

use Laravel\Scout\Searchable;
use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Supplier extends Model
{
    use Presentable, Searchable;

    protected $fillable = ['name', 'address', 'telephone', 'email', 'supplier_type_id'];

    protected $presenter = 'App\Presenters\SupplierPresenter';

    /******************
     * Custom methods *
     ******************/

    public function imagePath()
    {
        $image = $this->id . '.png';

        if (\Storage::disk('public')->exists('supplier/' . $image)) {
            return $image = asset('storage/supplier/' . $image);
        }

        return asset('img/default_supplier.png');
    }

    public function saveImage($image)
    {
        if ($image) {
            $imageName = $this->id . '.png';

            $originalImage = \Image::make($image->getRealPath());
            $originalImage->encode('png');
            $originalImage->orientate()->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();

            \Storage::disk('public')->put('supplier/' . $imageName, $originalImage);
        }
    }

    public function activeProductTypes()
    {
        $id = $this->id;
        $types = \App\ProductType::whereHas('product', function($query) use ($id) {
            $query->where('supplier_id', $id);
        })->get();

        return $types;
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

    /*****************
     * Relationships *
     *****************/

    public function products()
    {
        return $this->hasMany(Product::class)->with(['productType', 'unity']);
    }

    public function productTypes()
    {
        return $this->hasMany(ProductType::class);
    }

    public function type()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id');
    }
}
