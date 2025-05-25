<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
class AuthController extends Controller
{
    public function login()
    {
        return view('login');
    }
    public function postLogin(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        if (auth()->attempt($credentials)) {
            $request->session()->regenerate();
            if(auth()->user()->role == 'admin'){
                return redirect('/admin/dashboard');
            }else{
                return redirect('/');
            }
        }
        return back()->with('error', 'Email atau Password salah');
    }

    public function register()
    {
        return view('register');
    }

    public function postRegister(Request $request)
    {
        $credentials = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required'],
        ]);
        User::create([
            'name' => $credentials['name'],
            'email' => $credentials['email'],
            'password' => bcrypt($credentials['password']),
        ]);
        return redirect('/login');
    }

    public function logout()
    {
        auth()->logout();
        return redirect('/');
    }

}
