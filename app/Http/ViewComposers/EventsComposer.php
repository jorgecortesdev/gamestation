<?php

namespace App\Http\ViewComposers;

use App\Combo;
use App\Extra;
use Illuminate\View\View;

class EventsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $combos = Combo::pluck('name', 'id');
        $extras = Extra::pluck('name', 'id');
        $view->with([
            'combos' => $combos,
            'extras' => $extras
        ]);
    }
}