<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Auth;

class PostController extends Controller
{
    public function index(Request $request)
    {
        $query = Post::with('category');

        if($request->search)
        {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if($request->c)
        {
            $query->where('category_id', $request->c);
        }
        
        $query->orderBy('id', 'desc');
        
        $posts = $query->paginate(20);


        $categories = Category::orderBy('name', 'asc')->get();

        return response()->json(compact('posts'), 200);
    }

    public function response(Request $request)
    {
        $post = Post::where('id', $request->id)->first();

        $post->status =  $request->status;

        $post->save();

        return response()->json(['message' => 'status updated'], 201);

    }

}
