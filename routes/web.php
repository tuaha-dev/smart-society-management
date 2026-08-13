<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{AuthController, ComplaintController, VisitorLogController};
use App\Models\{Complaint, VisitorLog};

Route::view('/', 'welcome');

Route::middleware(['guest'])->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
});

Route::middleware(['auth'])->group(function () {
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

    Route::get('/admin/dashboard', function () {
        if (auth()->user()->role !== 'Admin') return redirect()->route(strtolower(auth()->user()->role) . '.dashboard');
        
        return view('admin.dashboard', [
            'complaints' => Complaint::with('user')->latest()->get(),
            'visitors' => VisitorLog::latest()->get()
        ]);
    })->name('admin.dashboard');

    Route::get('/resident/dashboard', function () {
        if (auth()->user()->role !== 'Resident') return redirect()->route(strtolower(auth()->user()->role) . '.dashboard');
        
        return view('resident.dashboard', [
            'complaints' => Complaint::where('user_id', auth()->id())->latest()->get()
        ]);
    })->name('resident.dashboard');

    Route::get('/guard/dashboard', function () {
        if (auth()->user()->role !== 'Guard') return redirect()->route(strtolower(auth()->user()->role) . '.dashboard');
        
        return view('guard.dashboard', [
            'visitors' => VisitorLog::latest()->take(10)->get()
        ]);
    })->name('guard.dashboard');

    Route::post('/complaints', [ComplaintController::class, 'store'])->name('complaints.store');
    Route::patch('/complaints/{id}', [ComplaintController::class, 'updateStatus'])->name('complaints.updateStatus');
    Route::post('/visitors', [VisitorLogController::class, 'store'])->name('visitors.store');
});