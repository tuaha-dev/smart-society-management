<?php

namespace App\Http\Controllers;

use App\Models\Complaint;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ComplaintController extends Controller
{
    // Store new complaint (Resident)
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'category' => 'required|string',
            'description' => 'required|string',
        ]);

        Complaint::create([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'category' => $request->category,
            'description' => $request->description,
            'status' => 'Pending',
        ]);

        return back()->with('success', 'Helpdesk ticket submitted successfully!');
    }

    // Update status (Admin)
    public function updateStatus(Request $request, $id)
    {
        $complaint = Complaint::findOrFail($id);
        $complaint->update(['status' => $request->status]);

        return back()->with('success', 'Complaint status updated!');
    }
}