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
        $combos = Combo::all();
        $extras = Extra::pluck('name', 'id');

        $client_id = old('client_id');

        $clientsSelect = [];

        if ($client_id) {
            $clientsSelect = \App\Client::where('id', $client_id)->pluck('name', 'id');
        }

        $view->with(compact('combos', 'extras', 'clientsSelect'));
    }
}