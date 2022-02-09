<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __invoke()
    {
        $lastPostCreated = Post::orderBy('created_at','DESC')->first();
        $lastPostLastUser = Post::select('users.name','posts.slug','posts.title','posts.description','posts.image_path')
                        ->join('users','posts.user_id','=','users.id')
                        ->orderBy('users.created_at','DESC')->first();

        return view('index', compact('lastPostCreated','lastPostLastUser'));
    }
}
