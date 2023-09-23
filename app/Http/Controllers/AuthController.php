<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Auth\Events\Attempting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        return view('login',["title" => "Login"]);
    }

    public function auth(Request $request)
    {
        $input = $request->validate([
            'email' => 'required|email',
            'password' => 'required|min:5',
        ], [
            'email.required' => 'Email wajib di isi',
            'password.required' => 'Password wajib di isi',
        ]);

        if (Auth::attempt($input)) {
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', Auth::user()->name );
        }

        // $infologin = [
        //     'email' => $request->email,
        //     'password' => $request->password, 
        // ];

        // if(Auth::attempt($infologin)) {
        //     return redirect('dashboard');
        //  } elseif(Auth::guard('users')->attempt($infologin)){
        //     return redirect('dashboard');
        // }
         return redirect('/')->withErrors('error','Kesalahan Pada Email atau Password')->withInput();
    }

    public function logout(Request $request) 
    {
        Auth::logout();
    
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    
        return redirect('/');
    }

}
