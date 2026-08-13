@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-md-12 mb-4">
        <div class="card bg-dark text-white shadow-sm border-0">
            <div class="card-body p-4">
                <h2 class="fw-bold">Security Gate Terminal</h2>
                <p class="mb-0">Record visitor check-ins and audit gate entry activity.</p>
            </div>
        </div>
    </div>
</div>

@if(session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="row">
    <div class="col-md-4 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Visitor Check-In Log</div>
            <div class="card-body">
                <form action="{{ route('visitors.store') }}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Visitor Name</label>
                        <input type="text" name="visitor_name" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Phone Number</label>
                        <input type="text" name="phone" class="form-control" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Target Flat No.</label>
                        <input type="text" name="flat_number" class="form-control" placeholder="e.g. A-302" required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Purpose</label>
                        <select name="purpose" class="form-select" required>
                            <option value="Guest">Guest</option>
                            <option value="Delivery">Delivery / Courier</option>
                            <option value="Service">Maintenance Service</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-dark w-100">Log Entry</button>
                </form>
            </div>
        </div>
    </div>

    <div class="col-md-8 mb-4">
        <div class="card shadow-sm border-0">
            <div class="card-header bg-white fw-bold">Recent Visitor Entries</div>
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-striped align-middle mb-0">
                        <thead>
                            <tr>
                                <th>Visitor</th>
                                <th>Phone</th>
                                <th>Flat</th>
                                <th>Purpose</th>
                                <th>Time</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($visitors as $v)
                                <tr>
                                    <td class="fw-bold text-nowrap">{{ $v->visitor_name }}</td>
                                    <td class="text-nowrap">{{ $v->phone }}</td>
                                    <td><span class="badge bg-info text-dark">{{ $v->flat_number }}</span></td>
                                    <td>{{ $v->purpose }}</td>
                                    <td class="text-nowrap">{{ $v->entry_time }}</td>
                                </tr>
                            @empty
                                <tr><td colspan="5" class="text-center text-muted py-3">No visitors logged today.</td></tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection