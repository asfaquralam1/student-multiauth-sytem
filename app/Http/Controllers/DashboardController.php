<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Login();
        if (Auth::check()) {
            return view('dashboard');
        } else {
            return redirect('/')->with('status', 'Please login first');
        }
    }
}
