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

    public function edit($id)
    {        $act = Actor::get();
        $actor = Actor::findOrFail($id);
        return view('actors', ['actors' => $act, 'data' => $actor]);
    }
}
