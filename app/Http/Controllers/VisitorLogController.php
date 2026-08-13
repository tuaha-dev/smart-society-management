<?php

namespace App\Http\Controllers;

use App\Models\VisitorLog;
use Illuminate\Http\Request;

class VisitorLogController extends Controller
{
    // Store visitor log (Guard)
    public function store(Request $request)
    {
        $request->validate([
            'visitor_name' => 'required|string',
            'phone' => 'required|string',
            'flat_number' => 'required|string',
            'purpose' => 'required|string',
        ]);

        VisitorLog::create([
            'visitor_name' => $request->visitor_name,
            'phone' => $request->phone,
            'flat_number' => $request->flat_number,
            'purpose' => $request->purpose,
            'entry_time' => now(),
        ]);

        return back()->with('success', 'Visitor check-in logged successfully!');
    }
}