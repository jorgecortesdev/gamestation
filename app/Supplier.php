<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Laracodes\Presenter\Traits\Presentable;

class Supplier extends Model
{
    use Presentable;

    protected $fillable = ['name', 'address', 'telephone', 'email', 'supplier_type_id'];

    protected $presenter = 'App\Presenters\SupplierPresenter';

    public function products()
    {
        return $this->hasMany(SupplierProduct::class)->with(['type', 'unity']);
    }

    public function type()
    {
        return $this->belongsTo(SupplierType::class, 'supplier_type_id');
    }
}
