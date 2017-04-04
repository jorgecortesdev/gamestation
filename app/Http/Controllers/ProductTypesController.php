<?php

namespace App\Http\Controllers;

use Validator;
use App\ProductType;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
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
        $product_types = ProductType::latest('id')->paginate(20);
        return view('product_types.index', compact('product_types'));
    }

    public function create()
    {
      return view('product_types.create');
    }

    public function store(Request $request)
    {
      $validator = $this->validator($request->all());

      if ($validator->fails()) {
        $this->throwValidationException(
          $request, $validator
        );
      }

      $product_type = new ProductType($request->all());

      $product_type->save();

      flash('Tipo de producto agregado con exito', 'success');

      return redirect(route('product_type.index'));
    }

    public function edit(ProductType $product_type)
    {
      return view('product_types.edit', compact('product_type'));
    }

    public function update(Request $request, ProductType $product_type)
    {
      $validator = $this->validator($request->all());

      if ($validator->fails()) {
        $this->throwValidationException(
          $request, $validator
        );
      }

      $product_type->update($request->all());

      flash('Tipo de producto actualizado con éxito', 'success');

      return redirect(route('product_type.index'));
    }

    public function destroy($id)
    {
      $product_type = ProductType::find($id);
      $product_type->delete();

      flash('Tipo de producto borrado con éxito', 'success');
      return back();
    }

    public function productsBySupplierIdAndTypeId($supplier_id)
    {
        $supplier = \App\Supplier::find($supplier_id);
        $products = $supplier->products->map(function ($product) {
            return [
                'id'   => $product->id,
                'name' => $product->name
            ];
        });

        return $products;
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
