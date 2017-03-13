<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductManagerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function productsByEntity($entity_name, $entity_id)
    {
        $entity = 'App\\' . ucfirst($entity_name);
        $entity = $entity::with('products.supplier')->find($entity_id);
        return $entity->products;
    }

    public function productsByType($type_id)
    {
        $type = ProductType::with('supplierProducts.supplier')->find($type_id);
        return $type->supplierProducts;
    }

    public function update(Request $request, $entity_name, $entity_id)
    {
        $product_ids = $request->product_ids;
        $quantities = $request->quantities;

        $data = [];

        foreach ($product_ids as $key => $product_id) {
            $data[$product_id] = ['quantity' => $request->quantities[$key]];
        }

        $entity = 'App\\' . ucfirst($entity_name);
        $entity = $entity::find($entity_id);
        $entity->products()->sync($data);

        // return redirect(route($entity_name . '.show', [$entity_name => $entity->id]));
        return back();
    }
}
