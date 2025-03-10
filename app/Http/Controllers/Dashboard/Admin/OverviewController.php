<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function index()
    {
        $totalAdmins = User::role('administrator')->count();
        return view('dashboard.admin.index', [
            'totalAdmins' => $totalAdmins
        ]);
    }
}
