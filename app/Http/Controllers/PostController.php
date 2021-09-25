<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function showData(){
         $posts = Post::simplePaginate(10);
        return view('show_data',compact('posts'));
    }
}
