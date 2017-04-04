<?php

namespace App\Http\Controllers;

use DB;
use Validator;
use App\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
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
        $suppliers = Supplier::with('type')->latest('id')->paginate(20);
        return view('suppliers.index', compact('suppliers'));
    }

    public function show(Request $request, Supplier $supplier)
    {
        $request->session()->put('redirect_url', $request->fullUrl());

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

        flash('Proveedor actualizado con éxito', 'success');

        return redirect(route('supplier.index'));
    }

    public function destroy($id)
    {
        $supplier = Supplier::find($id);
        $supplier->delete();

        flash('Proveedor borrado con éxito', 'success');

        return back();
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required',
            'telephone' => 'numeric|min:10',
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
