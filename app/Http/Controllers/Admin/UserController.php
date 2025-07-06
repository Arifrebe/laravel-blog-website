<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Role;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::with('role')->get();

        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserRequest $request)
    {
        $data = $request->validated();

        if (Role::count() === 0) {
            Role::insert([
                ['id' => 1, 'name' => 'Admin'],
                ['id' => 2, 'name' => 'Author'],
                ['id' => 3, 'name' => 'User'],
            ]);
        }

        if ($request->hasFile('profile')) {
            $file = $request->file('profile');
            $fileName = Str::uuid() . '_profile.' . $file->getClientOriginalExtension();
            $file->storeAs('user/profiles', $fileName, 'public');

            $data['profile'] = 'user/profiles/' . $fileName;
        }

        if ($request->hasFile('background')) {
            $file = $request->file('background');
            $fileName = Str::uuid() . '_background.' . $file->getClientOriginalExtension();
            $file->storeAs('user/backgrounds', $fileName, 'public');

            $data['background'] = 'user/backgrounds/' . $fileName;
        }

        User::create($data);

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dibuat!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $user->with('role', 'comments', 'blogs')->firstOrFail();

        return view('admin.users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('admin.users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UserRequest $request, User $user)
    {
        $data = $request->validated();

        if ($request->hasFile('profile')) {
            if ($user->profile && \Storage::disk('public')->exists($user->profile)) {
                \Storage::disk('public')->delete($user->profile);
            }

            $file = $request->file('profile');
            $fileName = Str::uuid() . '_profile.' . $file->getClientOriginalExtension();
            $file->storeAs('user/profiles', $fileName, 'public');

            $data['profile'] = 'user/profiles/' . $fileName;
        }

        if ($request->hasFile('background')) {
            if ($user->background && \Storage::disk('public')->exists($user->background)) {
                \Storage::disk('public')->delete($user->background);
            }

            $file = $request->file('background');
            $fileName = Str::uuid() . '_background.' . $file->getClientOriginalExtension();
            $file->storeAs('user/backgrounds', $fileName, 'public');

            $data['background'] = 'user/backgrounds/' . $fileName;
        }

        if (empty($data['password'])) {
            unset($data['password']);
        }

        $user->update($data);

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil diubah!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        if (!empty($user->profile)) {
            if ($user->profile && \Storage::disk('public')->exists($user->profile)) {
                \Storage::disk('public')->delete($user->profile);
            }
        }
        if (!empty($user->background)) {
            if ($user->background && \Storage::disk('public')->exists($user->background)) {
                \Storage::disk('public')->delete($user->background);
            }
        }

        $user->delete();

        return redirect()->route('admin.user.index')->with('success', 'Pengguna berhasil dihapus!');
    }
}
