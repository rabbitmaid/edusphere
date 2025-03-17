<?php

namespace App\Http\Controllers\Dashboard\Student;

use App\Models\Transaction;
use Illuminate\Http\Request;
use App\Models\SystemSetting;
use App\Http\Controllers\Controller;

class OverviewController extends Controller
{
    public function index()
    {
        return view('dashboard.student.index', [
            'transactions' => Transaction::where(['user_id' => auth()->user()->id])->latest()->get(),
            'totalTransaction' => Transaction::totalTransaction(auth()->user()->id)->total,
            'currency' => SystemSetting::currency()
        ]);
    }
}
