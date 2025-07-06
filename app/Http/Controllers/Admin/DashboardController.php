<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Blog;
use App\Models\User;
use Carbon\Carbon;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $today = Carbon::today();

        // Blog
        $blogTotal = Blog::count();
        $blogToday = Blog::whereDate('created_at', $today)->count();
        $popularBlogs = Blog::with('category', 'author')->orderBy('views', 'desc')->take(5)->get();

        // User
        $userTotal = User::count();
        $userWithProfile = User::whereNotNull('profile')->count();
        $userWithBackground = User::whereNotNull('background')->count();
        $userWithFacebook = User::whereNotNull('facebook')->count();
        $userWithInstagram = User::whereNotNull('instagram')->count();
        $userWithTwitter = User::whereNotNull('twitter')->count();
        $usersByRole = User::select('role_id', DB::raw('count(*) as total'))->groupBy('role_id')->get();
        $latestUsers = User::orderBy('created_at', 'desc')->take(5)->get();

        return view('admin.dashboard', compact(
            'blogTotal', 'blogToday', 'popularBlogs',
            'userTotal', 'userWithProfile', 'userWithBackground',
            'userWithFacebook', 'userWithInstagram', 'userWithTwitter',
            'usersByRole', 'latestUsers'
        ));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
