<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class PostController extends Controller
{
    public function addPost()
    {
        return view('add');
    }
    public function createPost(Request $request)
    {
        $post = new Post();
        $post->title = $request->title;
        $post->save();
        return back()->with('post_created', 'Post has been Created');
    }
    public function deletepost($id)
    {
        Post::where('id', $id)->delete();
        return back()->with('post_delete','Post has been deleted successfully!');
    }

    public function editpost($id)
    {
        $post=post::find($id);
        return view ('edit-post',compact('post'));
    }
    public function updatepost(Request $request){

      $post=Post::find($request->id);
      $post->title=$request->title;
      $post->save();
      return back()->with('post-updated','Post have been updated');

    }
}
