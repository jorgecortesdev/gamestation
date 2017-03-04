<?php

namespace App\Http\Controllers;

use Validator;
use App\SupplierType;
use Illuminate\Http\Request;

class SupplierTypesController extends Controller
{
    public function index()
    {
        $supplier_types = SupplierType::paginate(20);
        return view('suppliertypes.index', compact('supplier_types'));
    }

    public function create()
    {
        return view('suppliertypes.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $supplier_type = new SupplierType($request->all());

        $supplier_type->save();

        flash('Tipo de proveedor agregado con éxito', 'success');

        return redirect(route('supplier_type.index'));
    }

    public function edit(SupplierType $supplier_type)
    {
        return view('suppliertypes.edit', compact('supplier_type'));
    }

    public function update(Request $request, SupplierType $supplier_type)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $supplier_type->update($request->all());

        flash('Tipo de proveedor actualizado con éxito', 'success');

        return redirect(route('supplier_type.index'));
    }

    public function destroy($id)
    {
        $supplier_type = SupplierType::find($id);
        $supplier_type->delete();

        flash('Tipo de proveedor borrado con éxito', 'success');

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
