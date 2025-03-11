<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Student;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StudentController extends Controller
{
    public function index()
    {
        $students = Student::all();
        return view('dashboard.admin.students.index', [
            'students' => $students
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.students.create');
    }
}
