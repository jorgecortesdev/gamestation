<?php

namespace App\Http\Controllers;

use Validator;
use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $clients = Client::latest('id')->paginate(20);
        return view('clients.index', compact('clients'));
    }

    public function create()
    {
        return view('clients.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $client = new Client($request->all());

        $client->save();

        flash('Cliente agregado con éxito', 'success');

        return redirect(route('client.index'));
    }

    public function edit(Client $client)
    {
        return view('clients.edit', compact('client'));
    }

    public function update(Request $request, Client $client)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $client->update($request->all());

        flash('Cliente actualizado con éxito', 'success');

        return redirect(route('client.index'));
    }

    public function destroy($id)
    {
        $client = Client::find($id);
        $client->delete();

        flash('Cliente borrado con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required',
            'address' => 'required',
            'telephone' => 'required',
            'email' => 'email',
        ];

        $messages = [
            'name.required' => 'El campo es requerido.',
            'address.required' => 'El campo es requerido',
            'telephone.required' => 'El campo es requerido.',
            'email.email' => 'No es un correo válido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
