<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use PhpParser\Node\Expr\New_;

class HomeController extends Controller
{
    //
    public function index(){
        return view('home');
    }
    public function parctice(){
        return view('parctice');
    }
    public function parctice_create(Request $request){
       $request->validate([
        'name' => 'required|min:8',
        'email' => 'required|unique:users',
        'password'=> 'required|min:5'
       ]);

       $user = new User();
       $user->name = $request->name;
       $user->email = $request->email;
       $user->password = Hash::make($request->password);
       $user->save();
    }
}
