<?php

namespace App\Http\Controllers;

use App\Client;
use App\Repositories\Clients;
use App\Http\Requests\SaveClient;
use App\Http\Requests\SearchClient;

class ClientsController extends Controller
{
    /** @var Clients Client repository */
    protected $clients;

    public function __construct(Clients $clients)
    {
        $this->clients = $clients;
    }

    public function index()
    {
        $clients = $this->clients->latest();
        return view('pages.clients.index', compact('clients'));
    }

    public function create()
    {
        return view('pages.clients.create');
    }

    public function store(SaveClient $request)
    {
        try {
            $this->clients->save($request->all());
            flash('Cliente agregado con éxito', 'success');
        } catch (\Illuminate\Database\QueryException $e) {
            flash('ERROR: ' . $e->getMessage(), 'danger');
        }

        return redirect(route('clients.index'));
    }

    public function edit(Client $client)
    {
        return view('pages.clients.edit', compact('client'));
    }

    public function update(SaveClient $request, Client $client)
    {
        try {
            $this->clients->save($request->all(), $client);
            flash('Cliente actualizado con éxito', 'success');
        } catch (\Illuminate\Database\QueryException $e) {
            flash('ERROR: ' . $e->getMessage(), 'danger');
        }

        return redirect(route('clients.index'));
    }

    public function destroy($id)
    {
        try {
            $this->clients->delete($id);
            flash('Cliente borrado con éxito', 'success');
        } catch(\Illuminate\Database\QueryException $e) {
            flash($e->errorInfo[2], 'error');
        }

        return back();
    }

    public function searchForSelect(SearchClient $request)
    {
        $clients = new \App\Repositories\Clients();
        return $clients->searchForSelect($request->q);
    }

    public function searchForAutocomplete(SearchClient $request)
    {
        $clients = new \App\Repositories\Clients();
        return $clients->searchForAutocomplete($request->q);
    }
}
