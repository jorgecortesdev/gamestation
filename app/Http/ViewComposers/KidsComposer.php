<?php

namespace App\Http\ViewComposers;

use Illuminate\View\View;

class KidsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $kid       = $view->kid;
        $client_id = old('client_id');

        $clientsSelect = [];

        if ($client_id) {
            $clientsSelect = \App\Client::where('id', $client_id)->pluck('name', 'id');
        } else if ($kid) {
            $clientsSelect = $kid->clients()->pluck('name', 'client_id');
        }

        $view->with('clientsSelect', $clientsSelect);
    }
}