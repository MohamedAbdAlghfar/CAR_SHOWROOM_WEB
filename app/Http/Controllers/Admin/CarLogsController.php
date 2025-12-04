<?php

namespace App\Http\Controllers\Admin;

use App\Models\CarLog;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CarLogsController extends Controller
{
    public function showLogs() { 
    $logs = CarLog::latest()->paginate(20);
    return view('admin.car_logs', compact('logs'));
}
}
