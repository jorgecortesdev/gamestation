<?php

namespace App\Http\ViewComposers;

use App\PropertyType;
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
        $property_types = PropertyType::pluck('name', 'id');

        $view->with('property_types', $property_types);
    }
}