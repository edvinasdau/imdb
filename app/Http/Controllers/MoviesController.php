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

    public function single_movie($id)
    {
        $movie = Movie::findOrFail($id);
        $actors = $movie->actors;
        //dd($actors);
        return view('single_movie', ['movie' => $movie, 'actors' => $actors]);
    }

    public function show_by_category(Request $request)
    {
        $categories = Category::all();
         if($request->category_id == 'all'){
             $movies = Movie::all();
             $category = '';
         }  else {
             $category = Category::findOrFail($request->category_id);
             $movies = $category->movies()->orderBy('name', 'asc')->get();
         }
        return view('movies', ['movies' => $movies, 'cat' => $category, 'categories' => $categories]);
    }

    public function test()
    {

        $filmai = json_decode(file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=be98f6d22107b703991b078fdf1aeb9c&language=en-US'));

        //dd($filmai);
        $description = '';
        foreach ($filmai->genres as $filmas){
           $category_id = Category::create([
               'name' => $filmas->name,
               'description' => $description,
               'user_id' => '5']);

           // $category_id->id
        }


        //return view('/movies', ['movies' => $filmai, 'categories' => $categories] );
    }

}
