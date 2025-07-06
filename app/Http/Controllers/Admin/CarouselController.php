<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\CarouselRequest;
use App\Models\Carousel;
use App\Models\Blog;

class CarouselController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
   public function index()
    {
        $usedBlogIds = Carousel::pluck('blog_id')->toArray();
        $blogs = Blog::whereNotIn('id', $usedBlogIds)->get();
        $carousels = Carousel::with('blog.author')->get();

        return view('admin.carousels.index', compact('blogs', 'carousels'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarouselRequest $request)
    {
        $maxCarousel = 4;
        $currentCount = Carousel::count();

        if ($currentCount >= $maxCarousel) {
            return back()->with('error', 'Jumlah maksimum carousel telah tercapai.');
        }

        Carousel::create($request->validated());

        return back()->with('success', 'Carousel berhasil ditambahkan!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carousel $carousel)
    {
        $carousel->delete();

        return back()->with('success', 'Carousel berhasil dihapus!');
    }
}
