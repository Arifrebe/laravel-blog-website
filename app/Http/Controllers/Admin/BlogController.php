<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use App\Http\Requests\BlogRequest;
use App\Models\Blog;
use App\Models\Category;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $blogs = Blog::with('author', 'category')->latest()->get();

        return view('admin.blogs.index', compact('blogs'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.blogs.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(BlogRequest $request)
    {
        $data = $request->validated();

        // Simpan file cover jika ada
        if ($request->hasFile('cover_image')) {
            $file = $request->file('cover_image');
            $fileName = Str::uuid() . '_' . Str::slug($data['title']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blog-cover', $fileName, 'public');

            $data['cover_image'] = 'blog-cover/' . $fileName;
        }

        $data['tags'] = explode(',', $request->input('tags'));
        $data['author_id'] = Auth::id() ?? 1;

        Blog::create($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil dibuat!');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        $categories = Category::all();

        return view('admin.blogs.edit', compact('blog', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(BlogRequest $request, Blog $blog)
    {
        $data = $request->validated();

        // Hapus     lama jika diganti
        if ($request->hasFile('cover_image')) {
            if ($blog->cover_image && Storage::disk('public')->exists($blog->cover_image)) {
                Storage::disk('public')->delete($blog->cover_image);
            }

            $file = $request->file('cover_image');
            $fileName = Str::uuid() . '_' . Str::slug($data['title']) . '.' . $file->getClientOriginalExtension();
            $file->storeAs('blog-cover', $fileName, 'public');

            $data['cover_image'] = 'blog-cover/' . $fileName;
        }

        $data['tags'] = explode(',', $request->input('tags'));

        $blog->update($data);

        return redirect()->route('admin.blog.index')->with('success', 'Blog berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        if ($blog->cover_image && Storage::disk('public')->exists($blog->cover_image)) {
            Storage::disk('public')->delete($blog->cover_image);
        }

        $blog->delete();

        return back()->with('success', 'Blog berhasil dihapus!');
    }
}
