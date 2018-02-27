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

    public function change_role($id, Request $request){
        $user = User::findOrFail($id);
        $user->update(['role' => $request-> change_role]);
        return redirect()->back();

    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect('users/users');
    }
}
