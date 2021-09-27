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

    public function addData(){
        return view('add_data');
    }

    public function storeData(Request $request){
        if($request->isMethod('post')){
            $data = $request->all();

            $rules = [
                'title'=>'required',
                'description'=>'required',
            ];

            $cm = [
                'title.required'=>'Post title is required',
                'description.required'=>'Post description is required',
            ];

            $this->validate($request,$rules,$cm);
            return $data;
        }
    }
}
