<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $posts = Post::where('is_active', true)
            ->latest()
            ->paginate(12);
        
        return view('blog.index', compact('posts'));
    }

    public function show($slug)
    {
        $post = Post::where('slug', $slug)
            ->where('is_active', true)
            ->firstOrFail();

        $post->increment('views');

        $relatedPosts = Post::where('is_active', true)
            ->where('id', '!=', $post->id)
            ->latest()
            ->take(4)
            ->get();

        return view('blog.show', compact('post', 'relatedPosts'));
    }
}
