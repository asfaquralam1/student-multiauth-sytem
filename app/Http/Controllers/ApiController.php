<?php

namespace App\Http\Controllers;

use App\Model\Studentfrom;
use Illuminate\Http\Request;

class ApiController extends Controller
{
    public function getStudents()
    {
        $query = Studentfrom::select('id','name', 'course', 'section');
        return datatables($query)->make(true);
    }
}
