<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class SesiController extends Controller
{
    function index() 
    {
        return view('login');
    }

    public function login(Request $request) 
    {
        $request->validate([
            'email' => 'required',
            'password' => 'required',
        ], [
            'email.required' => 'email wajib diisi',
            'password.required' => 'password wajib diisi',
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password, 
        ];

        if(Auth::attempt($infologin)) {
           if(Auth::user()->role_id == 1 ) {
            return redirect()->route('home.admin');
            }elseif (Auth::user()->role_id == 2) {
            return redirect()->route('home.user');
            } else{
                return redirect('')->withErrors('kesalahan pada username atau password')->withInput();
            }
        }
    }
    
    function logout()
    {
        Auth::logout();
        return  redirect('');
    }
}
