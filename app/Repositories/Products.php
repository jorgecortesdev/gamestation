<?php

namespace App\Repositories;

use App\Product;
use Illuminate\Http\Request;

class Products extends Repository
{
    protected $model = Product::class;

    public function save(Request $request, Product $product = null)
    {
        $this->model = ! is_null($product) ? $product : new Product;

        $this->model->name = $request->name;
        $this->model->supplier_id = $request->supplier_id;
        $this->model->quantity = $request->quantity;
        $this->model->unity_id = $request->unity_id;
        $this->model->price = ($request->price * 100) / $request->quantity;
        $this->model->iva = ! is_null($request->iva);
        $this->model->product_type_id = $request->product_type_id;
        $this->model->save();
        $this->model->saveImage($request->image);

        return $this->model;
    }
}
