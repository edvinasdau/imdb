<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Movie;
use Auth;
use Storage;

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

    public function edit($id){
        $cat = Category::get();
        $mo = Movie::all();
            $mov = Movie::get();
        $movie = Movie::findOrFail($id);
        return view('movies', ['movies' => $mo, 'data' => $movie, 'categories' => $cat, 'movies' => $mov]);
    }

    public function update( Request $request,$id)
    {
        $movie = Movie::findOrFail($id);
        $movie->update($request->except('_token'));
        return redirect()->back()->with('status', 'updated');
    }

    public function destroy($id){
        $movie = Movie::findOrFail($id);
        $image = $movie->image;
        foreach ($image as $img)
        {
            Storage::delete('public/image/' . $img->filename);
        }
        $movie->delete();
        $movie->image()->delete();
        return redirect('movies');
    }
}
