<?php
namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use App\Supplier;
use App\Unity;
use Illuminate\Http\Request;
use Validator;

class ProductsController extends Controller
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
        $products = Product::with(['supplier', 'unity', 'productType'])->latest('id')->paginate(20);
        return view('products.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::pluck('name', 'id');
        $unities   = Unity::pluck('name', 'id');
        $types     = ProductType::pluck('name', 'id');
        return view('products.create', compact(['suppliers', 'unities', 'types']));
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
        $product->saveImage($request->image);

        flash('Producto agregado con éxito', 'success');

        return redirect(route('products.index'));
    }

    public function edit(Product $product)
    {
        $suppliers = Supplier::pluck('name', 'id');
        $unities   = Unity::pluck('name', 'id');
        $types     = ProductType::pluck('name', 'id');
        return view('products.edit', compact(['product', 'suppliers', 'unities', 'types']));
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
        $product->saveImage($request->image);

        flash('Producto actualizado con éxito', 'success');

        if ($request->session()->has('redirect_url')) {
            return redirect($request->session()->pull('redirect_url'));
        }

        return back();
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
            'supplier_id' => 'required|numeric',
            'quantity' => 'required|numeric',
            'unity_id' => 'required|numeric',
            'price' => 'required|numeric',
            'iva' => 'numeric',
            'product_type_id' => 'required|numeric',
            'image' => 'image|mimes:jpeg,png,jpg,gif'
        ];

        $messages = [
            'name.required' => 'El campo es requerido.',
            'supplier_id.required' => 'El campo es requerido.',
            'quantity.required' => 'El campo es requerido.',
            'unity_id.required' => 'El campo es requerido.',
            'price.required' => 'El campo es requerido.',
            'product_type_id.required' => 'El campo es requerido.'
        ];

        return Validator::make($data, $rules, $messages);
    }
}
