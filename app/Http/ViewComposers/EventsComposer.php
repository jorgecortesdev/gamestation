<?php

namespace App\Http\ViewComposers;

use App\Combo;
use App\Extra;
use App\Client;
use Illuminate\View\View;

class EventsComposer
{
    protected $view;

    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */
    public function compose(View $view)
    {
        $this->view = $view;

        $combos = Combo::all();

        $selectedClient = $this->getSelectedClient();
        $selectedKid = $this->getSelectedKid();
        $selectedCombo = $this->getSelectedCombo();

        $view->with(compact('combos', 'selectedClient', 'selectedKid', 'selectedCombo'));
    }

    protected function getSelectedClient()
    {
        $selectedClient = collect([
            ['id' => 0, 'text' => '-- Selecciona el cliente --']
        ]);

        $client_id = $this->findClientId();

        if (! is_null($client_id)) {
            $selectedClient = Client::select('id', 'name as text')->where('id', $client_id)->get();
        }

        return $selectedClient;
    }

    protected function getSelectedKid()
    {
        $kid_id = old('kid_id');

        if (is_null($kid_id) && ! is_null($this->view->event)) {
            $kid_id = $this->view->event->kid_id;
        }

        return $kid_id ?? 0;
    }

    protected function findClientId()
    {
        $client_id = old('client_id');

        if (is_null($client_id) && ! is_null($this->view->event)) {
            $client_id = $this->view->event->client_id;
        }

        return $client_id;
    }

    protected function getSelectedCombo()
    {
        $combo_id = old('combo_id');

        if (is_null($combo_id) && ! is_null($this->view->event)) {
            $combo_id = $this->view->event->combo_id;
        }

        return $combo_id ?? 0;
    }
}