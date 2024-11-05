<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('student.login');
    }
    public function login(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);
        $student = Student::where('email', $request->email)->first();

        if ($student && Hash::check($request->password, $student->password)) {
            // return redirect()->route('/register/student');
            return redirect()->intended('/register/student');
        } else {
            return back()->with('status', 'Invalid login cre');
        }
    }
}
