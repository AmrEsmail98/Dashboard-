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

    public function index()
    {
        $categories = Post::select('id','title')->get();
        return response()->json($categories);
    }
    public function createPost(Request $request)
    {
        $post = new Post();
        $request->validate([
            'title' => 'required|regex:/^[a-zA-Z]+$/u|max:100|nullable'
        ]);
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
