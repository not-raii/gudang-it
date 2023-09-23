<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index() 
    {

        $user = Role::select('id', 'name')->get();
        return view('register', [
            "title" => "Register",
            "user" => $user,
        ]);
    }

    public function store(Request $request) 
    {
        $request->validate([
            'name' => 'required|unique:users|max:255',
            'email' => 'required|email:dns|unique:users',
            'role_id' => 'required',
            'password' => 'required|min:5|confirmed',
            'password_confirmation' => 'required',
        ]);

        User::create([
            'name'      => $request->name,
            'email'     => $request->email,
            'role_id' => $request->role_id ,
            'password'  => Hash::make($request->password),
        ]);

        return redirect('/');
    }
}
