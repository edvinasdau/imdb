<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Actor;
use App\Image;
use Storage;
use App\Movie;


class ActorsController extends Controller
{
    public function index(){
        $act = Actor::get();
        $movie = Movie::all();
        return view("actors", ['actors' => $act, 'movies' => $movie]);
    }


    public function store_actor(Request $request){
        $user = Auth::user();
        $user->actors()->create($request->except('_token'));
        return redirect()->back();
    }

    public function edit($id){
        $movie = Movie::all();
        $act = Actor::all();
        $actor = Actor::findOrFail($id);
        return view('actors', ['actors' => $act, 'data' => $actor, 'movies' => $movie]);
    }

    public function update( Request $request,$id)
    {
        //dd($request);
        $actor = Actor::findOrFail($id);
        $actor->movie()->attach($request->movies);
        $actor->update($request->except('_token'));
        return redirect()->back()->with('status', 'updated');
    }

    public function destroy($id){
        $actor = Actor::findOrFail($id);
        $image = $actor->image;
        foreach ($image as $img)
        {
        Storage::delete('public/image/' . $img->filename);
        }
        $actor->delete();
        $actor->image()->delete();
        return redirect('actors');
    }

    public function single_actor($id)
    {
        $actor = Actor::findOrFail($id);
        $movies = $actor->movie;
        return view('single_actor', ['actor' => $actor, 'movies' => $movies]);
    }
}
