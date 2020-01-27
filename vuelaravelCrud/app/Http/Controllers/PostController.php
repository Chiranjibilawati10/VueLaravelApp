<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Resource\PostCollection;
use App\Post;

class PostController extends Controller
{
    public function store(Request $request)
    {
        //storing data in  variable and creating record
        $post = new Post([
            'title' => $request->get('title'),
            'body'  => $request->get('body')
        ]);

        $post->save();

        return response()->json('success');
    }

    public function index()
    {
        return new PostCollection(Post::all());
    }
    public function edit($id)
    {
        $post = Post::find($id);
        
        return response()->json($post);
    }

    public function update($id, Request $request)
    {
        $post = Post::find($id);
        $post->update($request->all());

        return response()->json('Data updated.');
    }

    public function delete($id)
    {
        $post = Post::find($id);

        $post->delete();

        return response()->json('Data deleted.');
    }
}
