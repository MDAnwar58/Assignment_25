<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    function login()
    {
        return view('auth.login');
    }
    function register()
    {
        return view('auth.register');
    }
    function loginRequest(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:6|max:20',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user)
        {
            if (password_verify($request->password, $user->password))
            {
                // $request->session()->put('LoggedUser', $user->id);
                if (Auth::guard('web')->attempt(['email' => $request->email, 'password' => $request->password])) 
                {
                    return redirect()->route('admin.dashboard');
                }else
                {
                    return redirect()->back()->with('error', 'Incorrect Email Or Password');
                }
            }
            else
            {
                return redirect()->back()->with('error', 'Incorrect Password');
            }
        }
        else
        {
            return redirect()->back()->with('error', 'No Account Found On This Email');
        }
    }
    function registerRequest(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6',
            'password_confirmation' => 'required|min:6',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            // 'password' => bcrypt($request->password),
        ]);

        return redirect()->route('login')->with('success', 'Registration Successfully');
    }

    function logout()
    {
        Auth::guard('web')->logout();
        return redirect()->route('login');
    }
}
