<?php

namespace App\Http\Controllers;

use App\Kid;
use Illuminate\Http\Request;

class KidsController extends Controller
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
        $kids = Kid::latest('id')->paginate(20);
        return view('kids.index', compact('kids'));
    }
}
