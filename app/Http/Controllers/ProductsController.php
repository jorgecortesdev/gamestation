<?php
namespace App\Http\Controllers;

use App\Product;
use App\Repositories\Products;
use App\Http\Requests\SaveProduct;

class ProductsController extends Controller
{
    /** @var App\Repositories\Products */
    protected $products;
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Products $products)
    {
        $this->middleware('auth');

        $this->products = $products;
    }

    public function index()
    {
        go()->after();

        $products = $this->products->latest();
        $products->load(['supplier', 'unity', 'productType']);

        return view('products.index', compact('products'));
    }

    public function show(Product $product)
    {
        go()->after();

        return view('products.show', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(SaveProduct $request)
    {
        $product = $this->products->save($request);

        flash('Producto agregado con éxito', 'success');

        return redirect($product->path());
    }

    public function edit(Product $product)
    {
        return view('products.edit', compact('product'));
    }

    public function update(SaveProduct $request, Product $product)
    {
        $this->products->setModel($product);

        $this->products->save($request, $product);

        flash('Producto actualizado con éxito', 'success');

        return go()->now();
    }

    public function destroy($id)
    {
        $this->products->delete($id);

        flash('Producto borrado con éxito', 'success');

        return back();
    }
}
