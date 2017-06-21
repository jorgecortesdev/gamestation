<?php

namespace App\Http\Controllers;

use App\Product;
use App\Supplier;
use App\Http\Requests\SaveProduct;

class ProductsController extends Controller
{

    public function show(Supplier  $supplier, Product $product)
    {
        go()->after();

        return view('pages.products.show', compact(['supplier', 'product']));
    }

    public function create(Supplier $supplier)
    {
        return view('pages.products.create', compact('supplier'));
    }

    public function store(SaveProduct $request, Supplier $supplier)
    {
        $supplier->addProduct($request->all());

        flash('Producto agregado con éxito', 'success');

        return redirect($supplier->path());
    }

    public function edit(Supplier $supplier, Product $product)
    {
        return view('pages.products.edit', compact('supplier', 'product'));
    }

    public function update(SaveProduct $request, Supplier $supplier, Product $product)
    {
        $product->iva = $request->get('iva', false);
        $product->update($request->all());

        flash('Producto actualizado con éxito', 'success');

        return go()->now();
    }

    public function destroy(Supplier $supplier, Product $product)
    {
        try {
            $product->delete();
            flash('Producto borrado con éxito', 'success');
        } catch(\Illuminate\Database\QueryException $e) {
            flash($e->errorInfo[2], 'error');
        }

        return back();
    }
}
