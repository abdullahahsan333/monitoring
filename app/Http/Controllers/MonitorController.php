<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitorController extends Controller
{
    public function notifications(Request $request)
    {
        return view('monitors.notifications');
    }

    public function status(Request $request)
    {
        return view('monitors.status');
    }

    public function complete(Request $request)
    {
        return view('monitors.complete');
    }
}
