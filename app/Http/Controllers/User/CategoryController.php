<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function index(Category $category) {
        $title = 'Kategori: ' . $category->name;
        $blogs = $category->blogs()->latest()->paginate(10);

        return view('user.blogs.index', compact('title', 'blogs'));
    }
}
