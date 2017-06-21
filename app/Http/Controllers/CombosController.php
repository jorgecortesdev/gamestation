<?php

namespace App\Http\Controllers;

use App\Combo;
use Validator;
use App\Repositories\Combos;
use Illuminate\Http\Request;

class CombosController extends Controller
{
    /** @var Combos Combo repository */
    protected $combos;

    public function __construct(Combos $combos)
    {
        $this->combos = $combos;
    }

    public function index()
    {
        $combos = $this->combos->latest();

        return view('pages.combos.index', compact('combos'));
    }

    public function show(Combo $combo)
    {
        $combo->load(['productTypes' => function($query) {
            $query->withPivot('quantity');
        }]);
        $combo->load(['productTypes.activeProduct.unity']);
        return view('pages.combos.show', compact('combo'));
    }

    public function create()
    {
        return view('pages.combos.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo = new Combo();
        $combo->name = $request->name;
        $combo->hours = $request->hours;
        $combo->kids = $request->kids;
        $combo->adults = $request->adults;
        $combo->price = $request->price;
        if (!empty($request->color_id)) {
            $combo->color_id = $request->color_id;
        }

        $combo->save();

        if (empty($request->properties)) {
            $combo->properties()->detach();
        } else {
            $combo->properties()->sync($request->properties);
        }

        flash('Paquete agregado con éxito', 'success');

        return redirect(route('combos.index'));
    }

    public function edit(Combo $combo)
    {
        return view('pages.combos.edit', compact('combo'));
    }

   public function update(Request $request, Combo $combo)
    {
        $data = array_merge($request->all(), ['id' => $combo->id]);

        $validator = $this->validator($data);

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo->update($request->all());

        if (empty($request->properties)) {
            $combo->properties()->detach();
        } else {
            $combo->properties()->sync($request->properties);
        }

        flash('Paquete actualizado con éxito', 'success');

        return redirect(route('combos.index'));
    }

    public function destroy($id)
    {
        try {
            $this->combos->delete($id);
            flash('Paquete borrado con éxito', 'success');
        } catch(\Illuminate\Database\QueryException $e) {
            flash($e->errorInfo[2], 'error');
        }

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required|unique:combos|min:3',
            'hours' => 'required|numeric',
            'kids' => 'required|numeric',
            'adults' => 'required|numeric',
            'price' => 'required|numeric',
            'color_id' => 'required|digits_between:1,11'
        ];

        if (isset($data['id'])) {
            $rules['name'] = 'required|min:3|unique:combos,id,' . $data['id'];
        }

        $messages = [
            'name.required' => 'El campo es requerido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
