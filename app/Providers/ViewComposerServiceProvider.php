<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Blog;
use App\Models\Category;
use Illuminate\Support\Facades\Cache;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        // Jangan taruh View::composer di sini
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer('user.layouts.header', function($view) {
            $categories = Category::inRandomOrder()
                ->take(5)
                ->get();

            $view->with(compact('categories'));
        });


        View::composer('user.layouts.blog.aside', function ($view) {
            $populars = Cache::remember('sidebar_populars_random', 600, function () {
                return Blog::with('author', 'category')
                    ->select('author_id', 'category_id', 'title', 'created_at', 'slug')
                    ->orderBy('views', 'desc')
                    ->take(4)
                    ->get();
            });

            $latests = Cache::remember('sidebar_latests_random', 600, function () {
                return Blog::with('author', 'category')
                    ->select('author_id', 'category_id', 'title', 'created_at', 'slug')
                    ->latest()
                    ->take(4)
                    ->get();
            });

            $tags = Cache::remember('sidebar_tags_random', 60, function () {
                return Blog::pluck('tags')
                    ->flatten()
                    ->map(fn($tag) => trim($tag))
                    ->filter()
                    ->unique()
                    ->shuffle()
                    ->take(8)
                    ->values();
            });

            $categories = Category::take(7)->get();

            $view->with(compact('populars', 'latests', 'categories', 'tags'));
        });
    }
}
