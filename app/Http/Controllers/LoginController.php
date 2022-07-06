<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('login', [
            'pageTitle' => 'Login'
        ]);
    }

    public function login_admin()
    {
        return view('login_admin', [
            'pageTitle' => 'Login Admin'
        ]);
    }

    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'loginFailed' => 'Login Failed!'
        ]);
    }

    public function authenticate_admin(Request $request)
    {
        $credentials = $request->validate([
            'username' => 'required',
            'password' => 'required'
        ]);


        if (Auth::attempt($credentials)) {
            // var_dump(Auth::user()->position_id);die;
            if (Auth::user()->position_id == 1) {
                $request->session()->regenerate();
                return redirect()->intended('/dashboard');
            } else {
                Auth::logout();
            }
        }
        
        return back()->withErrors([
            'loginFailed' => 'Maaf, anda bukan admin!'
        ]);
        // return $returns;
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
