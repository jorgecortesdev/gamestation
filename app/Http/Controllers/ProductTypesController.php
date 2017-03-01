<?php

namespace App\Http\Controllers;

use App\ProductType;
use Illuminate\Http\Request;

class ProductTypesController extends Controller
{
    public function index()
    {
        $product_types = ProductType::latest('id')->paginate(20);
        return view('producttypes.index', compact('product_types'));
    }
}
