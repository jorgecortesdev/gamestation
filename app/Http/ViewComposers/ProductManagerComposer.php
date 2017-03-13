<?php

namespace App\Http\ViewComposers;

use App\ProductType;
use Illuminate\View\View;

class ProductManagerComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $product_types = ProductType::pluck('name', 'id');
        $view->with('product_types', $product_types);
    }
}