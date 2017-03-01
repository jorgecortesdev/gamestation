<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::latest('id')->paginate(20);
        return view('users.index', compact('users'));
    }
}
