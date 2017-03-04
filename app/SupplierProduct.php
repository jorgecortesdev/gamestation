<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierProduct extends Model
{
    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function type()
    {
        return $this->belongsTo(ProductType::class, 'product_type_id');
    }

    public function unity()
    {
        return $this->belongsTo(Unity::class);
    }
}
