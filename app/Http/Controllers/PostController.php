<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Comment;

use App\Http\Requests\StorePostsRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class PostController extends Controller
{
    function index()
    {

        $posts = Post::simplepaginate(5);

        return view('posts', ["posts" => $posts]);
    }
    function create()
    {
        return view('formCreate');
    }

    function store(StorePostsRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = Auth::id();

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return redirect('/posts');
    }
    function show($id)
    {
        $post = Post::find($id);
        $comments = Comment::where('post_id', $id)->get();

        return view('showPost', ["post" => $post,"comments"=>$comments]);
    }

    function edit($id)
    {
        $post = Post::find($id);
        return view('formEdit', ["post" => $post]);
    }
    function update($id, StorePostsRequest $request)
    {
        $post = Post::find($id);
        if ($post->user_id !== auth()->id()) {
            abort(403, 'Unauthorized action.');
        }
        $post->title = $request->title;
        $post->body = $request->body;
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }
        $post->save();
        return redirect('/posts');
    }
    function destroy($id)
    {
        Post::destroy($id);
        return redirect('/posts');

    }
}
