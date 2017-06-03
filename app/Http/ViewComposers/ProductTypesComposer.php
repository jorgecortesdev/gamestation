<?php

namespace App\Http\ViewComposers;

use Route;
use App\Supplier;
use App\RenderType;
use Illuminate\View\View;

class ProductTypesComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $product_type = Route::current()->parameter('product_type');

        $products = [];

        if ($product_type) {
            $products = Supplier::with('products')
                ->whereHas('products', function ($query) use ($product_type) {
                        $query->where('product_type_id', $product_type->id);
                    })
                ->get()
                ->map(function ($supplier) use ($product_type) {
                    $products = $supplier->products->filter(function ($value, $key) use ($product_type) {
                            return $value->product_type_id == $product_type->id;
                        })->pluck('name', 'id')->toArray();
                    return ['supplier' => $supplier->name, 'products' => $products];
                })
                ->keyBy('supplier')
                ->map(function ($product) {
                    return $product['products'];
            });
        }

        $render_types = RenderType::pluck('name', 'id');

        $view->with(compact('products', 'render_types'));
    }
}