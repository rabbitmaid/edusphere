<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use Illuminate\Http\Request;

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
}
