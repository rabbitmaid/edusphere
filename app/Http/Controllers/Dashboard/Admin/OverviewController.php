<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use App\Models\Subject;
use App\Models\Sequence;
use App\Models\SchoolClass;
use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Http\Controllers\Controller;

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
        $dailyTransactions = Transaction::dailyTransactions();
        $totalTransactions = Transaction::totalTransactions()->total;
 
        return view('dashboard.admin.index', [
            'totalAdmins' => $totalAdmins,
            'totalStudents' => $totalStudents,
            'totalSubjects' => $totalSubjects,
            'totalClasses' => $totalClasses,
            'totalUserAccounts' => $totalUserAccounts,
            'totalMaleUsers' => $totalMaleUsers,
            'totalFemaleUsers' => $totalFemaleUsers,
            'totalSequences' => $totalSequences,
            'dailyTransactions' => $dailyTransactions,
            'totalTransactions' => $totalTransactions,
            'currency' => SystemSetting::currency()
        ]);
    }
}
