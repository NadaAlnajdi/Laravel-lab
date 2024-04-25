<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Post;
class CommentController extends Controller
{ 

    public function create(Request $request, $postId)
    {
        // dd($request->getRequestUri());
        // $param =explode("/",$request->getRequestUri()) ;
//        dd($param);
        // $post_id = $param[2];
        // dump($post_id);
        $post = Post::find($postId);

        // dump($post);
        if($post){
            return view('commentcreate',['post'=>$post]); 

        }
        return abort(404);
        
    }

public function store(Request $request, $postId)
{ 
    // dd($postId, $request->all());
    $request->validate([
        'body' => 'required|max:255',
    ]);
    $post = Post::find($postId);

    // if (!$post) {
        
    //     return redirect("/posts")->with('error', 'Post not found');
    // }

    $comment = new Comment();
    $comment->body = $request->body;
    $comment->user_id = Auth::id();
    $comment->post_id = $post->id;
    $comment->save();
    // dd($comment);
    // return 'doneeeeeeeeeeeeeeeeeeeeeeeeeeeeee';
    return redirect("/posts/{$post->id}")->with('success', 'Comment submitted successfully!');
}
}