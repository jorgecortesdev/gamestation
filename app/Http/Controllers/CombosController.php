<?php

namespace App\Http\Controllers;

use Validator;
use App\Combo;
use App\ComboItem;
use Illuminate\Http\Request;

class CombosController extends Controller
{
    public function index()
    {
        $combos = Combo::latest('id')->paginate(20);
        return view('combos.index', compact('combos'));
    }

    public function show(Combo $combo)
    {
        return view('combos.show', compact('combo'));
    }

    public function create()
    {
        return view('combos.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo = new Combo($request->all());

        $combo->save();

        flash('Paquete agregado con éxito', 'success');

        return redirect(route('combo.index'));
    }

    public function edit(Combo $combo)
    {
        return view('combos.edit', compact('combo'));
    }

   public function update(Request $request, Combo $combo)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $combo->update($request->all());

        flash('Paquete actualizado con éxito', 'success');

        return redirect(route('combo.index'));
    }

    public function destroy($id)
    {
        $combo = Combo::find($id);
        $combo->delete();

        flash('Paquete borrado con éxito', 'success');

        return back();
    }

    public function destroyItem($id)
    {
        $item = ComboItem::find($id);
        $item->delete();

        flash('Producto removido con éxito', 'success');

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
