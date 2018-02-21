<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Actor;
class ActorsController extends Controller
{
    public function index(){
        $act = Actor::get();
        return view("actors", ['actors' => $act]);
    }


    public function store_actor(Request $request){
        $user = Auth::user();
        $user->actors()->create($request->except('_token'));
        return redirect()->back();
    }

    public function edit($id){
        $act = Actor::all();
        $actor = Actor::findOrFail($id);
        return view('actors', ['actors' => $act, 'data' => $actor]);
    }

    public function update( Request $request,$id)
    {
        $actor = Actor::findOrFail($id);
        $actor->update($request->except('_token'));
        return redirect()->back()->with('status', 'updated');
    }

    public function destroy($id){
        $actor = Actor::findOrFail($id);
        $actor->delete();
        return redirect()->back();
    }
}
