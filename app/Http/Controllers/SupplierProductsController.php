<?php

namespace App\Http\Controllers;

use App\SupplierProduct;
use Illuminate\Http\Request;

class SupplierProductsController extends Controller
{
    public function index()
    {
        $products = SupplierProduct::with(['supplier', 'unity', 'type'])->latest('id')->paginate(20);
        return view('supplierproducts.index', compact('products'));
    }
}
