<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        return view('profile');
    }

    public function edit()
    {
        return view('editProfile');
    }

    public function update(Request $request)
    {
        $validatedData = $request->validate([
            'username' => 'required|unique:users,username,',
            'password' => 'required|min:8'
        ]);

        User::where('id', auth()->user()->id)
        ->update($validatedData);

        return redirect('/profile');
    }

    public function profile()
    {
        return view('profile');
    }
}
