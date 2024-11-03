<?php

namespace App\Http\Controllers;

use App\Student;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'password'=> 'required|min:5|max:15|confirmed'
       ]);

       $user = new Student();
       $user->name = $request->name;
       $user->email = $request->email;
       $image = $request->file('image');
       $imageName = time() .'.'. $image->getClientOriginalExtension();
       $image->move(public_path('images'), $imageName);
       $user->image = $imageName;
       $user->password = Hash::make($request->password);
       $user->save();
    }
    public function parctice_loginview(){
      return view('parcticelogin');
     }
    public function parctice_login(Request $request){
        $request->validate([
         'email' => 'required',
         'password'=> 'required'
        ]);
        $user  = User::where('email', $request->email)->first();

        if($user && Hash::check( $request->password,$user->password)){
            return redirect('/practice');
        }
        return redirect()->back();
     }
}
