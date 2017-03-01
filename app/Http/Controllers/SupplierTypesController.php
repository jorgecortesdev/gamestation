<?php

namespace App\Http\Controllers;

use App\SupplierType;
use Illuminate\Http\Request;

class SupplierTypesController extends Controller
{
    public function index()
    {
        $supplier_types = SupplierType::paginate(20);
        return view('suppliertypes.index', compact('supplier_types'));
    }
}
