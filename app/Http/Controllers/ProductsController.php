<?php

namespace App\Http\Controllers;

use Validator;
use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::latest('id')->paginate(20);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $types = ProductType::pluck('name', 'id');
        return view('products.create', compact('types'));
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $product = new Product($request->all());

        $product->save();

        flash('Producto agregado con éxito', 'success');

        return redirect(route('product.index'));
    }

    public function edit(Product $product)
    {
        $types = ProductType::pluck('name', 'id');
        return view('products.edit', compact(['product', 'types']));
    }

   public function update(Request $request, Product $product)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $product->update($request->all());

        flash('Producto actualizado con éxito', 'success');

        return redirect(route('product.index'));
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();

        flash('Producto borrado con éxito', 'success');

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
