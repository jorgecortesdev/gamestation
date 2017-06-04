<?php

namespace App\Http\Controllers;

use Validator;
use App\Unity;
use Illuminate\Http\Request;

class UnitiesController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $unities = Unity::latest()
            ->paginate(config('gamestation.results_per_page'));

        return view('pages.unities.index', compact('unities'));
    }

    public function create()
    {
        return view('pages.unities.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $unity = new Unity($request->all());

        $unity->save();

        flash('Unidad agregada con éxito', 'success');

        return redirect(route('unities.index'));
    }

    public function edit(Unity $unity)
    {
        return view('pages.unities.edit', compact('unity'));
    }

    public function update(Request $request, Unity $unity)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $unity->update($request->all());

        flash('Unidad actualizada con éxito', 'success');

        return redirect(route('unities.index'));
    }

    public function destroy($id)
    {
        $unity = Unity::find($id);

        try {
            $unity->delete();
            flash('Unidad borrada con éxito', 'success');
        } catch(\Illuminate\Database\QueryException $e) {
            flash($e->errorInfo[2], 'error');
        }

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required',
        ];

        $messages = [
            'name.required' => 'El campo es requerido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
