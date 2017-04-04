<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class SupplierProduct extends Model
{
    use Presentable;

    protected $fillable = ['name', 'supplier_id', 'quantity', 'unity_id', 'price', 'iva', 'product_type_id'];

    protected $presenter = 'App\Presenters\SupplierProductPresenter';

    protected $appends = ['is_active', 'unit_cost', 'total'];

    /******************
     * Custom methods *
     ******************/

    public function imagePath()
    {
        $image = $this->id . '.png';

        if (\Storage::disk('public')->exists('products/' . $image)) {
            return $image = asset('storage/products/' . $image);
        }

        return asset('img/default_product.png');
    }

    public function saveImage($image)
    {
        if ($image) {
            $imageName = $this->id . '.png';

            $originalImage = \Image::make($image->getRealPath());
            $originalImage->encode('png');
            $originalImage->resize(200, 200, function ($constraint) {
                $constraint->aspectRatio();
            })->stream();

            \Storage::disk('public')->put('products/' . $imageName, $originalImage);
        }
    }

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

    public function getIsActiveAttribute()
    {
        return $this->belongsTo(ProductType::class, 'id', 'supplier_product_id')->count() > 0;
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
