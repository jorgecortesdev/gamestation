<?php

namespace App\Repositories;

use App\Event;

class Events
{
    public function latest($paginate = 20)
    {
        return Event::latest('id')->paginate($paginate);
    }

    public function getConfigurableProductsList()
    {
        return \App\ProductType::with('supplierProducts.supplier.products')
            ->where('configurable', true)
            ->whereNotNull('supplier_product_id')
            ->get()
            ->map(function ($productType) {
                $activeProduct = $productType->supplierProduct;
                $availableProducts = $activeProduct->supplier->products->filter(function ($product) use ($activeProduct) {
                    return $product->id !== $activeProduct->id;
                })->pluck('name', 'id')->toArray();
                return [
                    'product_type' => $productType->name,
                    'products' => $availableProducts,
                    'customizable' => $productType->customizable,
                    'render' => strtolower($productType->renderType->name),
                ];
            });
    }

    public function getPropertiesList()
    {
        $properties = \App\Property::all();
        return $properties;
    }
}