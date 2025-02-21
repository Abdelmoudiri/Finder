<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login()
    {
        if(Auth::check())
        {
            return redirect(route('getAnnonce'));
        }
        return view('login');

    }

    function loginPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials))
        {
            return redirect()->intended(route('getAnnonce'));
        }
        return  redirect(route('login'))->with("error", "Invalid Credentials");
    }

    function register()
    {

        if(Auth::check())
        {
            return redirect(route('home'));
        }
        return view('register');
    }

    function  registerPost(Request $request)
    {
        $request->validate([
            'email' => 'required|email|unique:users',
            'password' => 'required',
            'name' => 'required',
            'confirmPassword'=>'required'
        ]);

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['password'] = Hash::make($request->password);
        $user= User::create($data);
        if(!$user)
        {
            return redirect(route('register'))->with('error', 'Something went wrong try again ');
        }
        return  redirect((route('login')))->with("success", "register avec success ");
    }

    function logout()
    {
       Session::flush();
       Auth::logout();
       return redirect(route('login'));
    }
}
