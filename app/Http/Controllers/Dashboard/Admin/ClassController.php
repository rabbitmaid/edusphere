<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ClassController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();

        return view('dashboard.admin.classes.index', [
            'classes' => $classes
        ]);
    }

    public function edit(int $id) 
    {
        $class = SchoolClass::findOrFail($id);
        
        return view('dashboard.admin.classes.edit', [
            'class' => $class
        ]);
    }

    public function student(int $id) {

        $class = SchoolClass::findOrFail($id);
        $students = Student::where(['class_id' => $id])->get();
        
        return view('dashboard.admin.classes.student', [
            'students' => $students,
            'class' => $class
        ]);
    }
}
