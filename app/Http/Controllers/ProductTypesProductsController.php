<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductType;
use Illuminate\Http\Request;

class ProductTypesProductsController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductType $productType, Product $activate)
    {

        $activate->isActive ? $activate->deactivate() : $activate->activate();

        return response()->json([
            'message' => 'Producto actualizado.',
            'data' => $activate,
        ], 200);

    }

}
