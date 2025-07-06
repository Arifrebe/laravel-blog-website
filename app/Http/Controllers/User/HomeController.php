<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Cache;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\Carousel;

class HomeController extends Controller
{
    public function index() {
        $carousels = $this->carousel();

        $blogs = Blog::with('author')
            ->select('id', 'title', 'author_id' ,'slug', 'description', 'cover_image', 'created_at')
            ->latest()
            ->take(7)
            ->get();

        $mainBlog = $blogs->first();
        $otherBlogs = $blogs->skip(1)->values();

        $trendings = Blog::with('author')
            ->select('title', 'slug', 'author_id')
            ->orderBy('views', 'desc')
            ->take(5)
            ->get();

        $cookingBlogs = Blog::with('author')
            ->whereHas('category', function($query) {
                $query->where('name', 'masakan');
            })
            ->select('id', 'title', 'slug', 'cover_image', 'description', 'author_id', 'created_at')
            ->latest()
            ->take(10)
            ->get();

        $soccerBlogs = Blog::with('author')
            ->whereHas('category', function($q) {
                $q->where('name', 'Bola');
            })
            ->latest()
            ->take(12)
            ->get();

        return view('user.dashboard', compact('carousels', 'mainBlog', 'otherBlogs', 'trendings', 'cookingBlogs', 'soccerBlogs'));
    }

    private function carousel() {
        $carousels = Cache::remember('cached_carousel', 600, function () {
            $carouselBlogIds = Carousel::pluck('blog_id')->filter()->unique();

           return Blog::whereIn('id', $carouselBlogIds)
            ->select('id', 'title', 'slug', 'cover_image', 'description')
            ->get();
        });

        $max = 4;
        $remaining = $max - $carousels->count();

        if ($remaining > 0) {
            $extraBlogs = Cache::remember("cached_random_blogs_" . md5($carousels->pluck('id')->implode(',')), 600, function () use ($carousels, $remaining) {
                $blogCount = Blog::whereNotIn('id', $carousels->pluck('id'))->count();

                return Blog::whereNotIn('id', $carousels->pluck('id'))
                    ->inRandomOrder()
                    ->limit($remaining)
                    ->select('id', 'title', 'slug' , 'cover_image', 'description')
                    ->get();
            });

            $carousels = $carousels->concat($extraBlogs);
        }

        return $carousels;
    }
}
