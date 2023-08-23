<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function index()
    {
        $users = User::latest()->get();
        return view('pages.user.index', compact('users'));
    }
    function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email|unique:users,email',
            'userType' => 'required'
        ]);
        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType
        ]);

        return redirect()->back()->with('success', 'User Type Added Successfully');
    }
    function edit($id)
    {
        $user = User::find($id);
        return view('pages.user.edit', compact('user'));
    }
    function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|max:50',
            'email' => 'required|email',
            'userType' => 'required'
        ]);

        User::find($id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'userType' => $request->userType
        ]);

        return redirect()->route('admin.user')->with('success', 'User Type Updated Successfully');
    }

    function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'User Type Deleted Successfully');
    }
}