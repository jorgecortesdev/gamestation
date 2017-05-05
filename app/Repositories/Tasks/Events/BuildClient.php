<?php

namespace App\Repositories\Tasks\Events;

use App\Client;
use Illuminate\Http\Request;

class BuildClient extends Task
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
        // Execute BuildKid before this
        // in order to have the kid id.
        if (is_null($this->model->kid_id)) {
            throw new TaskException(
                'You must set the property kid_id before execute ' . get_class($this)
            );
        }

        $client = $this->findOrNew($request->input('clientIdOrName'));

        $client->address   = $request->input('clientAddress');
        $client->telephone = $request->input('clientTelephone');
        $client->email     = $request->input('clientEmail');

        $client->kids()->sync([$this->model->kid_id]);

        $client->save();

        $this->model->client()->associate($client);
    }

    /**
     * Find or create a client model.
     *
     * @param  integer $id
     * @return App\Client
     */
    protected function findOrNew($idOrName)
    {
        if (ctype_digit($idOrName)) {
            $client = Client::findOrFail($idOrName);
        } else {
            $client = new Client;
            $client->name = $idOrName;
        }

        return $client;
    }
}
