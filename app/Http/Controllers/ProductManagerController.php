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

    public function productTypes($entity_name, $entity_id)
    {
        $entity = 'App\\' . ucfirst($entity_name);
        $ids = $entity::with('productTypes')->find($entity_id);
        $ids = $ids->productTypes->pluck('pivot.product_type_id');
        $types = ProductType::with(['supplier', 'supplierProduct'])
            ->whereNotNull('supplier_id')
            ->whereNotNull('supplier_product_id')
            ->whereNotIn('id', $ids)
            ->get();
        return $types;
    }

    public function productsByEntity($entity_name, $entity_id)
    {
        $entity = 'App\\' . ucfirst($entity_name);
        $entity = $entity::with(['productTypes.supplier', 'productTypes.supplierProduct'])->find($entity_id);
        return $entity->productTypes;
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
        $entity->productTypes()->sync($data);

        return back();
    }
}
