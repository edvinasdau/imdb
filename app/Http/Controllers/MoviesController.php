<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Movie;
use Auth;

class MoviesController extends Controller
{
    public function index(){
        $cat = Category::get();
        $mov = Movie::all();
        return view("movies", ['categories' => $cat, 'movies' => $mov]);
    }


    public function store_movie(Request $request){
        $user = Auth::user();
        $user->movies()->create($request->except('_token') + ['category_id' => $request->category_id]);
        return redirect()->back();
    }

    public function edit($id)
    {        $mov = Movie::get();
        $cat = Category::get();
        $movie = Movie::findOrFail($id);
        return view('movies', ['movies' => $mov, 'data' => $movie, 'categories' =>$cat]);
    }
}
