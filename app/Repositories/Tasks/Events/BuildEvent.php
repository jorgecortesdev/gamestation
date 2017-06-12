<?php

namespace App\Repositories\Tasks\Events;

use App\Kid;
use DateTime;
use App\Combo;
use App\Client;
use Illuminate\Http\Request;

class BuildEvent extends Task
{
    /**
     * Handles the task.
     *
     * @param  Illuminate\Http\Request $request
     * @return void
     *
     * @throws TaskException
     */
    public function handle(Request $request)
    {
        $date = DateTime::createFromFormat(
            'F j, Y H:i A',
            $request->input('occurs_on')
        );
        $this->model->occurs_on = $date;

        $client = Client::findOrFail($request->get('client_id'));
        $this->model->client()->associate($client);

        $kid = Kid::findOrFail($request->get('kid_id'));
        $this->model->kid()->associate($kid);

        $combo = Combo::findOrFail($request->input('combo_id'));
        $this->model->combo()->associate($combo);
    }
}
