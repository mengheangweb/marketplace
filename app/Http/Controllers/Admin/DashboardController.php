<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Post;

class DashboardController extends Controller
{
    public function totalPost()
    {
        $pendding = Post::whereStatus('waiting_approval')->count();
        $active = Post::whereStatus('approve')->count();
        $rejected = Post::whereStatus('reject')->count();

        return response()->json([
            'total_post' => [
                'pendding' => $pendding,
                'active' => $active,
                'rejected' => $rejected,
            ]
        ]);
    }
}
