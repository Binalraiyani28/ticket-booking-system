<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    // Show login form
    public function loginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        $user = User::where('email', $request->email)->first();

        if ($user && Hash::check($request->password, $user->password)) {
            session(['user_id' => $user->id]); // login via session
            return redirect('/dashboard');
        }

        return back()->with('error', 'Invalid credentials');
    }

    // Show registration form
    public function registerForm()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password); // secure hash
        $user->save();

        session(['user_id' => $user->id]); // set session

        return redirect('/dashboard');
    }

    public function logout()
    {
        session()->forget('user_id');
        return redirect('/');
    }

    public function dashboard()
    {
        $user = User::find(session('user_id'));
        return view('auth.dashboard', compact('user'));
    }
}
