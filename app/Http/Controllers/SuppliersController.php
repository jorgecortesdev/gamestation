<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function index()
    {
        $suppliers = Supplier::all();
        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Supplier $supplier)
    {
        return view('suppliers.show', compact('supplier'));
    }

    public function create()
    {
        return view('suppliers.create');
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $supplier = new Supplier($request->all());

        $supplier->save();

        flash('Proveedor agregado con éxito', 'success');

        return redirect(route('supplier.index'));
    }

    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    public function update(Request $request, Supplier $supplier)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $supplier->update($request->all());

        return back();
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required',
            'telephone' => 'required',
            'email' => 'email',
        ];

        $messages = [
            'name.required' => 'El campo es requerido.',
            'telephone.required' => 'El campo es requerido.',
            'email.email' => 'No es un correo válido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
