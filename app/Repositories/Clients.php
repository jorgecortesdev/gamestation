<?php

namespace App\Repositories;

use App\Client;

class Clients
{
    public function latest($paginate = 20)
    {
        return Client::latest('id')->paginate($paginate);
    }

    public function save(array $data, Client $client = null)
    {
        if (!$client) {
            $client = new Client();
        }

        $client->name      = $data['name'];
        $client->address   = $data['address'];
        $client->telephone = $data['telephone'];
        $client->email     = $data['email'];

        $client->save();
    }

    public function searchByName($query)
    {
        $query = str_replace(' ', '%', $query);

        $clients = Client::like('name', $query)->get();

        return $clients;
    }

    public function searchForSelect($query)
    {
        $clients = $this->searchByName($query);

        $clients = $clients->map(function ($client) {
            return [
                'id'   => $client->id,
                'text' => $client->name
            ];
        });

        $data['items']       = $clients->all();
        $data['total_count'] = $clients->count();

        return $data;
    }

    public function searchForAutocomplete($query)
    {
        $data['client'] = false;

        if (ctype_digit($query)) {
            $client = Client::with('kids')->findOrFail($query);
            $data['client'] = $client;
        }

        return $data;
    }

    public function delete($id)
    {
        $client = Client::findOrFail($id);
        $client->delete();
    }
}