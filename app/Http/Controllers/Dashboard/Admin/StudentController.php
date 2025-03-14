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

    public function edit(int $id)
    {
        $student = Student::findOrFail($id);

        return view('dashboard.admin.students.edit', [
            'student' => $student
        ]);
    }

    public function show(int $id) 
    {
        $student = Student::findOrFail($id);

        return view('dashboard.admin.students.show', [
            'student' => $student
        ]);
    }
}
