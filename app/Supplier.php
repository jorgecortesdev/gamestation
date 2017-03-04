<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'address', 'telephone', 'email', 'supplier_type_id'];

    public function products()
    {
        return $this->hasMany(SupplierProduct::class)->with(['type', 'unity']);
    }

    public function type()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id');
    }
}
