<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Middleware\RedirectIfAuthenticated;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    function index () {
        return view ('dashboardAdmin');
    }
    function user () {
        return view ('dashboardUser');
    }
    
}
