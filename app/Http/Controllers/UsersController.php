<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->paginate(config('gamestation.results_per_page'));
        return view('pages.users.index', compact('users'));
    }
}
