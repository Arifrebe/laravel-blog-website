<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class PostController extends Controller
{
    public function index() {
        $title = 'Indeks blog';
        $blogs = Blog::with('author', 'category')->paginate(10);

        return view('user.blogs.index', compact('blogs'));
    }

    public function search(Request $request) {
        $query = $request->input('query');
        $title = 'Pencarian: '. $query;

        $blogs = Blog::where('title', 'like', "%{$query}%")
                    ->orWhere('content', 'like', "%{$query}%")
                    ->paginate(10);

        return view('user.blogs.index', compact('blogs', 'title'));
    }

    public function show(Blog $blog) {
        $blog->with('author', 'category', 'comments ');

        return view('user.blogs.show', compact('blog'));
    }
}
