<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;

class ActorsController extends Controller
{
    public function index(){
        $cat = Category::get();
        return view("actors", ['categories' => $cat]);
    }


    public function store_actor(Request $request){
        $user = Auth::user();
        $user->actors()->create($request->except('_token'));
        return redirect()->back();
    }
}
