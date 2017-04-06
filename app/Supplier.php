<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Supplier extends Model
{
    use Presentable;

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

    /*****************
     * Relationships *
     *****************/

    public function products()
    {
        return $this->hasMany(SupplierProduct::class)->with(['productType', 'unity']);
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
