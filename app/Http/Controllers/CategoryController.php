<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Category;

class CategoryController extends Controller
{
    public function index(){
        $cat = Category::get();
        return view("category", ['categories' => $cat]);
    }

    public function store_category(Request $request){
        $user = Auth::user();
        $user->categories()->create($request->except('_token'));
    return redirect()->back();
    }

    public function edit($id)
    {        $cat = Category::get();
        $category = Category::findOrFail($id);
        return view('category', ['categories' => $cat, 'data' => $category]);
    }

    public function update( Request $request,$id)
    {
        $category = Category::findOrFail($id);
        $category->update($request->except('_token'));
        return redirect()->back()->with('status', 'updated');
    }

    public function destroy($id){
       $category = Category::findOrFail($id);
       $category->delete();
        return redirect()->back();
    }
}
