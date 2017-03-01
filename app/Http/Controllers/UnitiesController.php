<?php

namespace App\Http\Controllers;

use App\Unity;
use Illuminate\Http\Request;

class UnitiesController extends Controller
{
    public function index()
    {
        $unities = Unity::latest('id')->paginate(20);
        return view('unities.index', compact('unities'));
    }
}
