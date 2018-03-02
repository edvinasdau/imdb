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

        $genres = json_decode(file_get_contents('https://api.themoviedb.org/3/genre/movie/list?api_key=be98f6d22107b703991b078fdf1aeb9c&language=en-US'));

        $description = '';
        foreach($genres->genres as $genre) {

           $category = Category::create([
              'name' => $genre->name,
               'description' => $description,
               'user_id' => '5']);
            $genre_id = $genre->id;

            $filmai = json_decode(file_get_contents('https://api.themoviedb.org/3/genre/'. $genre_id .'/movies?api_key=be98f6d22107b703991b078fdf1aeb9c&language=en-US&include_adult=false&sort_by=created_at.asc'));
//dd($filmai);
            foreach($filmai->results as $filmas){

                $date = explode('-', $filmas->release_date);
                $date = $date[0];

                Movie::create ([
                    'name' => $filmas->original_title,
                    'category_id' => $category->id,
                    'user_id' => '5',
                    'description' => $filmas->overview,
                    'years' => $date,
                    'rating' => $filmas->vote_average
                ]);
                //dd($filmas);
            }
        }

    }


}

// be98f6d22107b703991b078fdf1aeb9c

//139.59.191.148

// https://api.themoviedb.org/3/discover/movie?api_key=be98f6d22107b703991b078fdf1aeb9c&language=en-US&sort_by=popularity.desc&include_adult=false&include_video=false&page=