<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;
use App\Repositories\Clients;

class ApiClientController extends ApiController
{
    public function show(Client $client)
    {
        $client->load('kids');

        return $this->respond($client);
    }

    public function select2(Request $request)
    {
        $repo = new Clients();

        return $this->respond($repo->searchForSelect($request->q));
    }
}
