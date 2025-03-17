<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\SchoolClass;
use App\Models\Sequence;
use App\Models\Subject;

class OverviewController extends Controller
{
    public function index()
    {
        $totalAdmins = User::role('administrator')->count();
        $totalStudents = User::role('student')->count();
        $totalSubjects = Subject::count();
        $totalClasses = SchoolClass::count();
        $totalUserAccounts = User::count();
        $totalMaleUsers = User::where(['gender' => 'male'])->count();
        $totalFemaleUsers = User::where(['gender' => 'female'])->count();
        $totalSequences = Sequence::count();
 
        return view('dashboard.admin.index', [
            'totalAdmins' => $totalAdmins,
            'totalStudents' => $totalStudents,
            'totalSubjects' => $totalSubjects,
            'totalClasses' => $totalClasses,
            'totalUserAccounts' => $totalUserAccounts,
            'totalMaleUsers' => $totalMaleUsers,
            'totalFemaleUsers' => $totalFemaleUsers,
            'totalSequences' => $totalSequences
        ]);
    }
}
