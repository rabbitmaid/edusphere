<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Http\Request;

class SubjectController extends Controller
{
    public function index()
    {
        $subjects = Subject::latest()->get();
        return view('dashboard.admin.subjects.index', [
            'subjects' => $subjects
        ]);
    }

    public function create()
    {
        return view('dashboard.admin.subjects.create');
    }

    public function edit(int $id)
    {
        $subject = Subject::findOrFail($id);

        return view('dashboard.admin.subjects.edit', [
            'subject' => $subject
        ]);
    }
}
