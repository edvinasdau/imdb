<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class CategoryController extends Controller
{
    public function index(){
        return view("category");
    }
    public function store_category(Request $request){
        $user = Auth::user();
        $user->categories()->create($request->except('_token'));
    return redirect()->back();
    }
}
