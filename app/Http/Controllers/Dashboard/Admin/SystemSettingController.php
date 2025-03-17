<?php

namespace App\Http\Controllers\Dashboard\Admin;

use App\Http\Controllers\Controller;
use App\Models\SystemSetting;
use Illuminate\Http\Request;

class SystemSettingController extends Controller
{
    public function index()
    {
        $systemSettings = SystemSetting::all();
        return view('dashboard.admin.settings', [
            'settings' => $systemSettings
        ]);
    }
}
