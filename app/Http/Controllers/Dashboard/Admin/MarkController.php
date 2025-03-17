<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\Mark;
use App\Models\Student;
use App\Models\Sequence;
use App\Models\SchoolClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Subject;
use Illuminate\Support\Facades\Auth;

class MarkController extends Controller
{
    public function index()
    {
        $classes = SchoolClass::all();

        return view('dashboard.admin.marks.index', [
            'classes' => $classes 
        ]);
    }

    public function sequence(int $id)
    {
        $class = SchoolClass::findOrFail($id);
        $sequences = Sequence::all();

        return view('dashboard.admin.marks.sequence', [
            'sequences' => $sequences,
            'class' => $class
        ]);
    }

    public function subject(int $sequenceId, int $classId)
    {
        $class = SchoolClass::findOrFail($classId);
        $sequence = Sequence::findOrFail($sequenceId);
        $subjects = Subject::where(['class_id' => $class->id])->get();

        return view('dashboard.admin.marks.subject', [
            'sequence' => $sequence,
            'class' => $class,
            'subjects' => $subjects
        ]);
    }

    public function fill(int $sequenceId, int $classId, int $subjectId)
    {
        $class = SchoolClass::findOrFail($classId);
        $students = Student::where(['class_id' => $classId])->get();
        $sequence = Sequence::findOrFail($sequenceId);
        $subject = Subject::findOrFail($subjectId);

        return view('dashboard.admin.marks.fill', [
            'students' => $students,
            'class' => $class,
            'sequence' => $sequence,
            'subject' => $subject
        ]);
    }

    public function storeMark(Request $request)
    {
        
        $validated = $request->validate([
            'score' => ['required', 'array'],
            'score.*' => ['required', 'numeric', 'min:0', 'max:20'],
            'class_id' => 'required',
            'sequence_id' => 'required',
            'subject_id' => 'required'
        ]);

       $store =  Mark::storeMark($validated['score'], $validated['sequence_id'], $validated['subject_id'], Auth::user()->admin->id);

       return redirect()->back();

    }
}
