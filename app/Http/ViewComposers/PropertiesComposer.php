<?php

namespace App\Http\ViewComposers;

use App\RenderType;
use Illuminate\View\View;

class PropertiesComposer
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

        $view->with('render_types', $render_types);
    }
}