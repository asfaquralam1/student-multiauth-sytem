<?php

namespace App\Http\Controllers\Auth;

use App\Course;
use App\Http\Controllers\Controller;
use App\Http\Controllers\MailController;
use App\Student;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function index()
    {
        return view('student.register');
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:30',
            'email' => 'required|unique: students',
            'password' => 'required|confirmed|min:5',
            // 'phone' => ['required', 'integer'],
            // 'address' => ['required', 'string', 'max:255'],
            // 'gender' => ['required', 'string', 'max:255'],
            // 'date_of_birth' => ['required', 'string', 'max:255'],
            'image' => ['required|image|mimes:jpeg,png,jpg,gif,svg|max:2048'],
            'certificate' => 'required|mimes:pdf,xlx,csv|max:2048',
        ]);
    }

    public function register(Request $request)
    {
        $Student = Student::where('email', $request->email)->first();
        if ($Student) {
            return back()->with('status', 'Email is already registered');
        } else {
            $student = new Student();
            $student->name = $request->name;
            $student->email = $request->email;
            $student->password = Hash::make($request->password);
            $student->verification_code = rand(10000, 99999);
            $student->save();
            if ($student != null) {
                //send email
                MailController::sendSignupEmail($student->name, $student->email, $student->verification_code);
                return redirect('verify')->with($student->email, session()->flash('alert-success', 'Your account has benn created.please check email for varifification code'));
            }
            //show error message
            return redirect()->back()->with(session()->flash('alert-danger', 'Your account has benn created.please check email for varifification link'));
        }
    }
    public function verifyIndex()
    {
        return view('varifiacation.verification');
    }

    public function verifyUser(Request $request)
    {
        $this->validate($request, [
            // 'email' => 'required|email',
            'verification_code' => 'required',
        ]);
        $student = Student::where('verification_code', $request->verification_code)
            ->update(['is_verified' => 1]);

        $student = Student::where('verification_code', $request->verification_code)
            // ->where('email', $request->email) 
            ->first();

        if ($student) {
            return redirect('/')->with(session()->flash('alert-success', 'Your account is verified. Please login!'));
        }
        return redirect('/')->with(session()->flash('alert-danger', 'Invalid verification code!'));
    }
    public function registerstudent()
    {
        $studentshow = Student::with('courses')->get();
        return view('student.studnetshow', compact('studentshow'));
    }
    public function registerstudentedit($id)
    {
        $courses = Course::all();
        $student = Student::find($id);
        $selectedCourses = $student->courses->pluck('id')->toArray();
        return view('student.studentedit', compact('student', 'courses', 'selectedCourses'));
    }
    public function registerstudnetupdate(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'certificate' => 'required|mimes:pdf,xlx,csv|max:2048',
            'courses' => 'required|array',
            'courses.*' => 'exists:courses,id',
        ], [
            'image.required' => 'An image is required.',
            'image.image' => 'The file must be an image.',
            'image.mimes' => 'The image must be a file of type: jpeg, png, jpg, gif, svg.',
            'image.max' => 'The image may not be greater than 2048 kilobytes.',
            'certificate.required' => 'A certificate is required.',
            'certificate.mimes' => 'The certificate must be a file of type: pdf, xls, csv.',
            'certificate.max' => 'The certificate may not be greater than 2048 kilobytes.',
            'courses.required' => 'At least one course must be selected.',
            'courses.array' => 'Courses must be an array.',
            'courses.*.exists' => 'The selected course is invalid.',
        ]);


        $student = Student::find($id);
        $student->name = $request->name;
        $student->email = $request->email;
        $student->phone = $request->phone;
        $student->address  = $request->address;
        $student->gender  = $request->gender;
        $student->date_of_birth = $request->date_of_birth;
        $image = $request->file('image');
        $imageName = time() . '.' . $image->extension();
        $image->move(public_path('images'), $imageName);
        $student->image = $imageName;
        $certificate = $request->file('certificate');
        $fileName = time() . '.' . $certificate->extension();
        $certificate->move(public_path('certificate'), $fileName);
        $student->certificate = $fileName;
        $student->courses()->sync($request->courses);
        $student->save();
        $notification = array(
            'messege' => 'Successfully done',
            'alert-type' => 'success',
        );
        return redirect('register/student')->with('fileName', $fileName);
        //return Redirect()->back()->with($notification);
    }
    public function viewPDF($filename)
    {
        //$path = storage_path('certificate/' . $filename);
        $path = public_path('certificate/' . $filename);

        if (!file_exists($path)) {
            abort(404);
        }

        return response()->file($path);
    }
    public function destroy($id)
    {
        $student = Student::find($id);
        $student->delete();

        $notification = array(
            'messege' => 'Successfully done',
            'alert-type' => 'success',
        );
        return Redirect()->back()->with($notification);
    }
}
