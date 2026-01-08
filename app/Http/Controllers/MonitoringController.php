<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function index(Request $request)
    {
        return view('monitoring.index');
    }

    public function create(Request $request)
    {
        return view('monitoring.create');
    }
    
    public function store(Request $request)
    {
        return redirect()->route('monitoring.index');
    }

    public function show(Request $request)
    {
        return view('monitoring.show');
    }
}

