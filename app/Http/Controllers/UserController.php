<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        return view('profile', [
            'pageTitle' => 'Profile'
        ]);
    }

    public function edit()
    {
        return view('editProfile');
    }

    public function update(Request $request)
    {
        $validatedData['username'] = $request['username'];
        if($request['password']!=''){
            $validatedData['password'] = bcrypt($request['password']);
        }
        $path='';
        
        if ($request['old-password']!='' && Hash::check($request['old-password'], Auth::user()->password)) {
            redirect('/profile');
            
            if($request->hasFile('image')){
                $filename = auth()->user()->id.'-'.$request->image->getClientOriginalName();
                $path = $request->file('image')->storeAs('images',$filename, 'public');
                $validatedData['image'] = $filename;
            }
            
            User::find(auth()->user()->id)
            ->update($validatedData);
            
            // dd($path, $request['password'], Hash::check($request['old-password'], Auth::user()->password));
            // return redirect('/');
        }
        return redirect('/profile');
    }

    public function profile()
    {
        // dd('1');
        return view('profile', [
            'pageTitle' => 'Profile'
        ]);
    }
}
