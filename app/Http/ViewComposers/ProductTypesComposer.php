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
        $render_types = RenderType::pluck('name', 'id');

        $view->with(compact('render_types'));
    }
}