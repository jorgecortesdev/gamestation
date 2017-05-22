<?php

namespace App\Http\ViewComposers;

use App\Unity;
use App\Supplier;
use App\ProductType;
use Illuminate\View\View;

class ProductsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $suppliers = Supplier::pluck('name', 'id');
        $unities   = Unity::pluck('name', 'id');
        $types     = ProductType::pluck('name', 'id');

        $view->with(compact('suppliers', 'unities', 'types'));
    }
}