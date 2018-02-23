<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Movie;
use App\Actor;
use App\Image;

class UploadController extends Controller
{
    public function upload_actor(Request $request, $id)
    {
        $file = $request->file('pic');
        $path = $file->storePublicly('public/image');
        $filename = basename($path);
        $user=Auth::user();
        $actor=Actor::findOrFail($id);
        $actor->image()->create($request->except('_token') + ['filename' => $filename, 'user_id' => $user->id]);
        return redirect()->back();
    }

    public function upload_movie(Request $request, $id)
    {
        $file = $request->file('pic');
        $path = $file->storePublicly('public/image');
        $filename = basename($path);
        $user=Auth::user();
        $actor=Movie::findOrFail($id);
        $actor->image()->create($request->except('_token') + ['filename' => $filename, 'user_id' => $user->id]);
        return redirect()->back();
    }

}