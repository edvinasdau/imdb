<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class AdminController extends Controller
{
    public function index()

    {
        return view('admin');
    }

    public function show_users(){
        $user = User::get();
        return view('users', ['users' => $user]);
    }
}
