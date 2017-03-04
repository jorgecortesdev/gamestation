<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SupplierType extends Model
{
    protected $fillable = ['name'];

    public function suppliers()
    {
        return $this->hasMany(Supplier::class);
    }
}
