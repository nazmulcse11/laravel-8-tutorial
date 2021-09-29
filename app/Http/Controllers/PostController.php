<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use Toastr;

class PostController extends Controller
{
    public function showData(){
         $posts = Post::latest()->simplePaginate(10);
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

            $post = new Post();
            $post->title = $data['title'];
            $post->description = $data['description'];
            $post->status = '0';
            $post->save();
            Toastr::success('Post Successfully Added', 'Success', ["positionClass" => "toast-top-right","closeButton"=> "true","progressBar"=> "true"]);
            return redirect('/show-data');
        }
    }

    // edit data
    public function editData($id =null){
        $post = Post::findOrFail($id);
        return view('edit_data',compact('post'));
    }

    public function storeEditData(Request $request,$id=null){
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

            $post = Post::findOrFail($id);
            $post->title = $data['title'];
            $post->description = $data['description'];
            $post->save();
            Toastr::success('Post Successfully Updated', 'Success', ["positionClass" => "toast-top-right","closeButton"=> "true","progressBar"=> "true"]);
            return redirect('/show-data');
        }
    }

    //delete data
    public function deleteData($id=null){
        Post::findOrFail($id)->delete();
        Toastr::success('Post Successfully Deleted', 'Success', ["positionClass" => "toast-top-right","closeButton"=> "true","progressBar"=> "true"]);
            return redirect()->back();
    }
}
