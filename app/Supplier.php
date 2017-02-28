<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    protected $fillable = ['name', 'address', 'telephone', 'email', 'type'];

    public function products()
    {
        return $this->hasMany(SupplierProduct::class);
    }
}
