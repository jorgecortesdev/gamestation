<?php

namespace App\Http\Controllers;

use Validator;
use App\Property;
use Illuminate\Http\Request;

class PropertiesController extends Controller
{

    public function index()
    {
        $properties = Property::with('renderType')
            ->latest()
            ->paginate(config('gamestation.results_per_page'));

        return view('pages.properties.index', compact('properties'));
    }

    public function create()
    {
        return view('pages.properties.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if (!empty($request->get('options'))) {
            $options = explode(',', $request->options);
            $request->merge(['options' => $options]);
        }

        $property = new Property($request->all());

        $property->save();

        flash('Propiedad agregada con éxito', 'success');

        return redirect(route('properties.index'));
    }

    public function edit(Property $property)
    {
        return view('pages.properties.edit', compact('property'));
    }

    public function update(Request $request, Property $property)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        if (!empty($request->get('options'))) {
            $options = explode(',', $request->options);
            $request->merge(['options' => $options]);
        }

        $property->update($request->all());

        flash('Propiedad actualizada con éxito', 'success');

        return redirect(route('properties.index'));
    }

    public function destroy($id)
    {
        $property = Property::findOrFail($id);
        $property->delete();

        flash('Propiedad borrada con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'label' => 'required',
            'render_type_id' => 'required',
        ];

        $messages = [
            'label.required' => 'El campo es requerido.',
            'render_type_id.required' => 'El campo es requerido',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
