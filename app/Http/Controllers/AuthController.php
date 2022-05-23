<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class AuthController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }
    public function store()
    {
        $registerData = request()->validate([
            'name' => 'required | max:255 | min:3',
            'username' => ['required', 'max:255', 'min:3', Rule::unique('users', 'username')],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => 'required | min:8',
        ]);
        $user = User::create($registerData);
        auth()->login($user);
        return redirect('/')->with('success', "Thanks for Registeration! Dear \"$user->name\"");
    }
    public function logout()
    {
        auth()->logout();
        return redirect('/')->with('success', "Logged Out !!!");
    }
    public function login()
    {
        return view('auth.login');
    }
    public function login_store()
    {
        $loginData = request()->validate([
            'email' => ['required', 'email', 'max:255', Rule::exists('users', 'email')],
            'password' => 'required | min:8',
        ], [
            'email.required' => 'We need your Email Address.',
            'password.min' => 'Password must be more than 8 Characters.',
        ]);
        
        if(auth()->attempt($loginData)) {
            if(auth()->user()->is_admin) {
                return redirect('/admin/blogs')->with('success', "Admin Dashboard Login Successfully!");
            } else {
                return redirect('/')->with('success', "Login Successfully! Welcome Back.");
            }
        } else {
            // return back()->withErrors([
            //     'email' => "User Credentials Wrong.",
            // ]);
            return back()->with('login_error', "User Credentials Wrong.");
        }
    }
}
