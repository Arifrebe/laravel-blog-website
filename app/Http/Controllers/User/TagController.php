<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class TagController extends Controller
{
    public function index($tag) {
        $blogs = Blog::whereJsonContains('tags', $tag)->latest()->paginate(10);
        $title = "Tag: " . $tag;

        return view('user.blogs.index', compact('title', 'blogs'));
    }
}
