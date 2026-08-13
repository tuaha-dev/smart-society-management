@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card bg-primary text-white shadow-sm border-0">
            <div class="card-body p-4">
                <h2 class="fw-bold">Administrator Control Center</h2>
                <p class="mb-0">System-wide monitoring for ticket resolution and security audits.</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-md-7 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">All Resident Helpdesk Tickets</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Resident</th>
                                <th>Ticket</th>
                                <th>Category</th>
                                <th>Status Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($complaints as $c)
                                <tr>
                                    <td class="fw-bold text-nowrap">{{ $c->user->username ?? 'Unknown' }}</td>
                                    <td>
                                        <strong>{{ $c->title }}</strong><br>
                                        <small class="text-muted">{{ $c->description }}</small>
                                    </td>
                                    <td><span class="badge bg-secondary">{{ $c->category }}</span></td>
                                    <td style="min-width: 140px;">
                                        <form action="{{ route('complaints.updateStatus', $c->complaint_id) }}" method="POST">
                                            @csrf
                                            @method('PATCH')
                                            <select name="status" onchange="this.form.submit()" class="form-select form-select-sm">
                                                <option value="Pending" {{ $c->status == 'Pending' ? 'selected' : '' }}>Pending</option>
                                                <option value="In Progress" {{ $c->status == 'In Progress' ? 'selected' : '' }}>In Progress</option>
                                                <option value="Resolved" {{ $c->status == 'Resolved' ? 'selected' : '' }}>Resolved</option>
                                            </select>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr><td colspan="4" class="text-center text-muted py-3">No resident tickets found.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <div class="col-md-5 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Gate Security Audit Trail</div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
                    @forelse($visitors as $v)
                        <li class="list-group-item py-2 border-bottom">
                            <strong class="text-dark">{{ $v->visitor_name }}</strong> visited Flat <span class="badge bg-dark">{{ $v->flat_number }}</span>
                            <br><small class="text-muted">Purpose: {{ $v->purpose }} | Logged at: {{ $v->entry_time }}</small>
                        </li>
                    @empty
                        <li class="list-group-item text-center text-muted">No gate entries recorded.</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection