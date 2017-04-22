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

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Clients $clients)
    {
        $this->middleware('auth');

        $this->clients = $clients;
    }

    public function index()
    {
        $clients = $this->clients->latest();
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(SaveClient $request)
    {
        $this->clients->save($request->all());

        flash('Cliente agregado con éxito', 'success');

        return redirect(route('client.index'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(SaveClient $request, Client $client)
    {
        $this->clients->save($request->all());

        flash('Cliente actualizado con éxito', 'success');

        return redirect(route('client.index'));
    }

    public function destroy($id)
    {
        $this->clients->delete($id);

        flash('Cliente borrado con éxito', 'success');

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
