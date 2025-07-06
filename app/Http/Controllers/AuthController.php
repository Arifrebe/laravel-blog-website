<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function loginview()  {
        return view('auth.login');
    }

    public function login(Request $request) {
        $request->validate([
            'password' => 'required|min:8'
        ]);
    
        $credentials = $request->only('username', 'password');
    
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();
    
            $user = Auth::user();
    
            if ($user->role_id == 1) {
                return redirect()->route('admin.dashboard');
            } else {
                return redirect('/');
            }
        } else {
            return redirect()->route('login-blade')->withErrors(['error' => 'username atau password salah']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return back();
    }

    public function registerview()  {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // Validate the incoming request data
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'username' => ['required', 'string', 'max:255', 'unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        // Create and save the new user
        $user = User::create([
            'name' => $request->name,
            'username' => $request->username,
            'email' => $request->email,
            'role_id' => '1',
            'password' => Hash::make($request->password),
        ]);

        // Automatically log in the newly registered user
        Auth::login($user);

        // Redirect the user to a specific page after successful registration
        return redirect('/')->with('success', 'Welcome! Your account has been created successfully!');
    }
}
