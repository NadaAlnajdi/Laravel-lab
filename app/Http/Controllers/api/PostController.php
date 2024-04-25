<?php

namespace App\Http\Controllers\api;
use App\Models\Post;
use App\Http\Resources\PostResource;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\StorePostsRequest;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    function index()
    {

        $posts = Post::with('user')->simplePaginate(5);

        return PostResource::collection($posts);

    }

    function store(StorePostsRequest $request)
    {
        $post = new Post;
        $post->title = $request->title;
        $post->body = $request->body;
        $post->user_id = $request->user_id;

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('images', 'public');
            $post->image = $imagePath;
        }

        $post->save();

        return ("post stored");   
     }


     function show($id)
     {
         $post = Post::find($id);
         if (!$post) {
             return response()->json(['error' => 'Post not found'], 404);
         }
         return new PostResource($post);     }

     function update($id , StorePostsRequest $request){
        $post = Post::find($id);
        
        if (!$post) {
            return response()->json(['error' => 'Post not found']);
        }
        
            $post->title = $request->title;
            $post->body = $request->body;
            
            $post->save();
        
        return ("post Updated");
    }
    function destroy(Request $request, $id){
        $post = Post::find($id);
        
        if (!$post) {
            return response()->json(['error' => 'Post not found']);
        }

        $post->delete();
        
        return ("deleted");
    }
    

}
