<?php

namespace App\Http\Controllers;

use Validator;
use App\ProductType;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
{

    public function index()
    {
        $productTypes = ProductType::with('activeProduct.supplier')
            ->latest('id')
            ->paginate(
                config('gamestation.content.results_per_page')
            );

        return view('pages.products.types.index', compact('productTypes'));
    }

    public function create()
    {
      return view('pages.products.types.create');
    }

    public function store(Request $request)
    {
      $validator = $this->validator($request->all());

      if ($validator->fails()) {
        $this->throwValidationException(
          $request, $validator
        );
      }

      $productType = new ProductType($request->all());
      $productType->save();

      flash('Tipo de producto agregado con exito', 'success');

      return redirect(route('product-types.index'));
    }

    public function edit(ProductType $productType)
    {
      return view('pages.products.types.edit', compact('productType'));
    }

    public function update(Request $request, ProductType $productType)
    {
      $validator = $this->validator($request->all());

      if ($validator->fails()) {
        $this->throwValidationException(
          $request, $validator
        );
      }

      $productType->configurable = $request->get('configurable', false);

      $productType->customizable = $request->get('customizable', false);

      $productType->update($request->all());

      flash('Tipo de producto actualizado con éxito', 'success');

      return redirect(route('product-types.index'));
    }

    public function destroy($id)
    {
      $productType = ProductType::find($id);

        try {
            $productType->delete();
            flash('Tipo de producto borrado con éxito', 'success');
        } catch(\Illuminate\Database\QueryException $e) {
            flash($e->errorInfo[2], 'error');
        }

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
