<?php

namespace App\Repositories;

use App\Client;

class Clients extends Repository
{
    protected $model = Client::class;

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
}
