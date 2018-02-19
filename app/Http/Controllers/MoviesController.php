<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Auth;

class MoviesController extends Controller
{
    public function index(){
        $cat = Category::get();
        return view("movies", ['categories' => $cat]);
    }


    public function store_movie(Request $request){
        $user = Auth::user();
        $user->movies()->create($request->except('_token') + ['category_id' => $request->category_id]);
        return redirect()->back();
    }
}
