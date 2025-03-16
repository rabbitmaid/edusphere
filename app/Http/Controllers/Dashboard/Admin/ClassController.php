<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Student;
use App\Models\SchoolClass;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
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

    public function list(int $id) 
    {
        $class = SchoolClass::findOrFail($id);
        $students = Student::where(['class_id' => $id])->get();
        $pdf = Pdf::loadView('pdf.classlist', ['students' => $students, 'class' => $class]);
        return $pdf->download(strtolower(str_replace(' ', '_',$class->name))."_classlist_".strtoupper(Str::random(10)).".pdf");
    }
}
