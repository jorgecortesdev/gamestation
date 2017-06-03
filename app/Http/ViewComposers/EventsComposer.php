<?php

namespace App\Http\ViewComposers;

use App\Combo;
use App\Extra;
use App\Client;
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

        $event = $view->event;

        if ($event) {
            $clientIdOrName = $event->client->id;
        } else {
            $clientIdOrName = old('clientIdOrName');
        }

        $clientsSelect  = [];

        if ($clientIdOrName) {
            if (is_numeric($clientIdOrName)) {
                $clientsSelect = Client::where('id', $clientIdOrName)->pluck('name', 'id')->toArray();
            } else {
                $clientsSelect = [$clientIdOrName => $clientIdOrName];
            }
        }

        $view->with(compact('combos', 'clientsSelect'));
    }
}