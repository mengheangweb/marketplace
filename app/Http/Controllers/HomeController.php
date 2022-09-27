<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;

class HomeController extends Controller
{
    public function admin()
    {
        return view('admin.app');
    }


    public function index()
    {
        // select * from posts
        $posts = Post::limit(8)->orderBy('id', 'desc')->get();

        return view('home', compact('posts'));
    }

    public function about()
    {
        return view('about');
    }
}
