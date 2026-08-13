@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card bg-success text-white shadow-sm border-0">
            <div class="card-body p-4">
                <h2 class="fw-bold">Resident Portal</h2>
                <p class="mb-0">Welcome, {{ Auth::user()->username }}! Raise complaints and track your maintenance status.</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-md-5 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Raise Helpdesk Ticket</div>
            <div class="card-body">
                <form action="{{ route('complaints.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Subject Title</label>
                        <input type="text" name="title" class="form-control" placeholder="e.g. Water leak in balcony" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Category</label>
                        <select name="category" class="form-select" required>
                            <option value="Plumbing">Plumbing</option>
                            <option value="Electrical">Electrical</option>
                            <option value="General Maintenance">General Maintenance</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Description</label>
                        <textarea name="description" class="form-control" rows="3" required></textarea>
                    </div>
                    <button type="submit" class="btn btn-success w-100">Submit Ticket</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-7 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">My Helpdesk Tickets</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Status</th>
                                <th>Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $c)
                                <tr>
                                    <td class="text-nowrap">{{ $c->title }}</td>
                                    <td><span class="badge bg-secondary">{{ $c->category }}</span></td>
                                    <td>
                                        <span class="badge bg-{{ $c->status == 'Resolved' ? 'success' : ($c->status == 'In Progress' ? 'warning' : 'danger') }}">
                                            {{ $c->status }}
                                        </span>
                                    </td>
                                    <td class="text-nowrap">{{ $c->created_at->format('M d, Y') }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted py-3">No tickets raised yet.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection