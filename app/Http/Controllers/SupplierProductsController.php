<?php
namespace App\Http\Controllers;

use App\Unity;
use Validator;
use App\Supplier;
use App\ProductType;
use App\SupplierProduct;
use Illuminate\Http\Request;

class SupplierProductsController extends Controller
{
    public function index()
    {
        $products = SupplierProduct::with(['supplier', 'unity', 'type'])->latest('id')->paginate(20);
        return view('supplierproducts.index', compact('products'));
    }

    public function create()
    {
        $suppliers = Supplier::pluck('name', 'id');
        $unities   = Unity::pluck('name', 'id');
        $types = ProductType::pluck('name', 'id');
        return view('supplierproducts.create', compact(['suppliers', 'unities', 'types']));
    }

    public function store(Request $request)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $product = new SupplierProduct($request->all());

        $product->save();

        flash('Producto agregado con éxito', 'success');

        return redirect(route('supplier_product.index'));
    }

    public function edit(SupplierProduct $supplier_product)
    {
        $suppliers = Supplier::pluck('name', 'id');
        $unities   = Unity::pluck('name', 'id');
        $types = ProductType::pluck('name', 'id');
        return view('supplierproducts.edit', compact(['supplier_product', 'suppliers', 'unities', 'types']));
    }

    public function update(Request $request, SupplierProduct $supplier_product)
    {
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $supplier_product->update($request->all());

        flash('Producto actualizado con éxito', 'success');

        return redirect(route('supplier_product.index'));
    }

    public function destroy($id)
    {
        $product = SupplierProduct::find($id);
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