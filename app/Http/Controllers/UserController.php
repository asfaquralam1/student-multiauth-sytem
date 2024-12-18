<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $user = User::all();
        return view('user.index',compact('user'));
    }

    public function create()
    {
       return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'name' => 'required|max:25|min:4',
            'email' => 'required|unique:users',
            'password' => 'required|min:5'
        ]);

        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        $notification=array(
            'messege'=> 'Successfully done',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $user = User::find($id);
        return response()->json($user);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        //
        $user = User::findorfail($id);
        return view('user.edit',compact('user'));
    }

    /**
     * Update the specified resource in storag
     */
    public function update(Request $request, $id)
    {
        $user = User::findorfail($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->save();
        $notification=array(
            'messege'=> 'Successfully done',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $user=User::findOrFail($id);
        $user->delete();

        $notification=array(
            'messege'=> 'Successfully done',
            'alert-type'=>'success',
        );
        return redirect()->back()->with($notification);
    }
}
