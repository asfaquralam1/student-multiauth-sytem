<?php

namespace App\Http\Controllers\Auth;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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

        $student = DB::table('students')
            ->where([
                ['email', '=', $request->input('email')],
            ])->first();
        if ($student) {
            $studentcheck = Hash::check($request->input('password'), $student->password);
            $data = [$student->email, $student->password];
            $request->session()->put('user',  $data);
            $studentlogin = [$student, $studentcheck];
            if ($studentlogin) {
                 // $courses = Course::all();
                // $stud = $courses->instructor();
                // dd($courses);
                return redirect()->route('/register/student');
            } else {
                return back()->with('status', 'Invalid login details');
            }
        } else {
            return back()->with('status', 'Invalid login details');
        }
    }
}
