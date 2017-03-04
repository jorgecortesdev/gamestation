<?php

namespace App\Http\Controllers;

use Validator;
use App\Unity;
use Illuminate\Http\Request;

class UnitiesController extends Controller
{
    public function index()
    {
        $unities = Unity::paginate(20);
        return view('unities.index', compact('unities'));
    }

    public function create()
    {
        return view('unities.create');
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

        return redirect(route('unity.index'));
    }

    public function edit(Unity $unity)
    {
        return view('unities.edit', compact('unity'));
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

        return redirect(route('unity.index'));
    }

    public function destroy($id)
    {
        $unity = Unity::find($id);
        $unity->delete();

        flash('Unidad borrada con éxito', 'success');

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
