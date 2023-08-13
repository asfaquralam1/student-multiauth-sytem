<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LogoutController extends Controller
{
    // public function store(){
    //     if(Auth::logout()){
    //         return view('/');
    //     }else{
    //         return redirect()->back();
    //     }
    // }
    public function logout(){
        if (session()->has('user')) {
            session()->pull('user');
        };
        return redirect('/');
    }
}
