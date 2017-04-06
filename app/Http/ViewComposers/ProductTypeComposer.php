<?php

namespace App\Http\ViewComposers;

use App\Supplier;
use Illuminate\View\View;

class ProductTypeComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $products = Supplier::with('products')
            ->whereHas('products', function ($query) {
                    $query->where('product_type_id', 2);
                })
            ->get()
            ->map(function ($supplier) {
                $products = $supplier->products->pluck('name', 'id')->toArray();
                return ['supplier' => $supplier->name, 'products' => $products];
                })
            ->keyBy('supplier')
            ->map(function ($product) {
                return $product['products'];
        });

        $view->with('products', $products);
    }
}