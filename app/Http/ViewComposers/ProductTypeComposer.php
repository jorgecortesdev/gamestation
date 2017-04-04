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
        $suppliers = Supplier::pluck('name', 'id');

        $view->with('suppliers', $suppliers);
    }
}