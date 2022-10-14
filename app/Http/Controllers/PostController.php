<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use App\Events\PostCreated;
use Auth;

class PostController extends Controller
{
    public function myPost(Request $request)
    {
        $query = Post::query();

        if($request->c)
        {
            $query->where('category_id', $request->c);
        }

        $query->where('user_id', Auth::user()->id);
        
        $query->orderBy('id', 'desc');
        
        $posts = $query->paginate(10);


        $categories = Category::orderBy('name', 'asc')->get();

        return view('pages.post.my-listing', compact('posts', 'categories'));
    }

    public function index(Request $request)
    {
        $query = Post::query();

        if($request->search)
        {
            $query->where('title', 'like', '%'.$request->search.'%');
        }

        if($request->c)
        {
            $query->where('category_id', $request->c);
        }

        $query->where('status', 'approve');
        
        $query->orderBy('id', 'desc');
        
        $posts = $query->paginate(20);


        $categories = Category::orderBy('name', 'asc')->get();

        return view('pages.post.listing', compact('posts', 'categories'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('title', 'asc')->get();


        return view('pages.post.add', compact('categories', 'tags'));
    }

    public function store(Request $request)
    {
        // validate user data
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required|max:100|min:3',
            'price' => 'required|numeric',
            'image' => 'required|image',
            'description' => 'required'
        ]);

        // store image
        $image = $request->image->store('posts');

        // insert data to database
        $post = Post::create([
                    'category_id' => $request->category,
                    'title' => $request->title,
                    'price' => $request->price,
                    'image' => $image,
                    'description' => $request->description,
                    'user_id' => auth()->user()->id,
                ]);

        $post->tag()->attach($request->tag);

        // send message to pusher

        PostCreated::dispatch($post);
        

        // redirect back
        return redirect()->back()->with('success', 'We are reviewing your post. It will take at lease 3 working days.');
    }

    public function detial($id)
    {
        $post = Post::where('id', $id)->first();

        $tags = $post->tag;

        return view('pages.post.detial', compact('post', 'tags'));
    }

    public function edit($id)
    {
        $post = Post::where('id', $id)->first();

        $post_tag = $post->tag->pluck('id')->toArray();

        $categories = Category::orderBy('name', 'asc')->get();
        $tags = Tag::orderBy('title', 'asc')->get();

        return view('pages.post.edit', compact('post', 'tags', 'post_tag', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $post = Post::where('id', $id)->first();

        if(! $post)
        {
            abort(404);
        }

        // validate user data
        $this->validate($request, [
            'category' => 'required',
            'title' => 'required|max:100|min:3',
            'price' => 'required|numeric',
            'image' => 'image',
            'description' => 'required'
        ]);

        // store image
        if($request->image)
        {
            $image = $request->image->store('posts');
        }
        else
        {
            $image = $post->image;
        }

        // insert data to database
        Post::where('id', $post->id)->update([
                    'category_id' => $request->category,
                    'title' => $request->title,
                    'price' => $request->price,
                    'image' => $image,
                    'description' => $request->description,
                ]);

        $post->tag()->sync($request->tag);


        // redirect back
        return redirect()->back()->with('success', 'We are reviewing your post. It will take at lease 3 working days.');
    }

    public function delete($id)
    {
        $post = Post::where('id', $id)->first();

        
        if(! $post)
        {
            abort(404);
        }

        $post->delete();

        return redirect()->back()->with('success', 'You have successfully deleted a post!.');

    }
}
