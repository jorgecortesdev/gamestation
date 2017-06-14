<?php

namespace App\Http\Controllers;

use Validator;
use App\Supplier;
use Illuminate\Http\Request;

class SuppliersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(Request $request)
    {
        go()->after();

        if ($request->input('query')) {
            $suppliers = Supplier::search($request->input('query'))->paginate(20);
        } else {
            $suppliers = Supplier::latest()->paginate(
                config('gamestation.content.results_per_page')
            );
        }

        return view('pages.suppliers.index', compact('suppliers'));
    }

    public function show(Request $request, Supplier $supplier)
    {
        go()->after();

        $activeProductTypes = $supplier->activeProductTypes();

        $products = $supplier->productsSortByActive('desc');

        return view('pages.suppliers.show', compact('supplier', 'products', 'activeProductTypes'));
    }

    public function create()
    {
        return view('pages.suppliers.create');
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

        return redirect(route('suppliers.show', $supplier->id));
    }

    public function edit(Supplier $supplier)
    {
        return view('pages.suppliers.edit', compact('supplier'));
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

        return go()->now();
    }

    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        flash('Proveedor borrado con éxito', 'success');

        return back();
    }

    public function search(Request $request)
    {
        $this->validate($request, ['query' => 'required']);

        $suppliers = Supplier::search(
            $request->get('query')
        )->paginate(20);

        return view('suppliers.index', compact('suppliers'));
    }

    protected function validator(array $data)
    {
        $rules = [
            'name' => 'required',
            'telephone' => 'required|numeric|min:10',
            'email' => 'email',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ];

        $messages = [
            'name.required' => 'El campo es requerido.',
            'telephone.required' => 'El campo es requerido.',
            'email.email' => 'No es un correo válido.',
        ];

        return Validator::make($data, $rules, $messages);
    }
}
