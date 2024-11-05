<?php

namespace App\Http\Controllers;

use App\Model\Studentfrom;
use App\Student;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getStudents()
    {
        $query = Student::select('id','name', 'course', 'section');
        return datatables($query)->make(true);
    }
}
