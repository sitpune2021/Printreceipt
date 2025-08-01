@extends('layouts.app')

@section('content')
<div class="container mt-5">

    <!-- Header -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-printer me-2"></i>Printers List
        </h3>
        <a href="{{ route('printer.printers.create') }}" class="btn text-white shadow-sm px-4" style="background-color: #1A3645;">
            <i class="bi bi-plus-circle me-2"></i>Add
        </a>
    </div>

    <!-- Success Message -->
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Printer Table -->
    <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-bordered align-middle mb-0">
                    <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                        <tr>
                            <th>#</th>
                            <th>Printer Type ID</th>
                            <th>MAC Address</th>
                            <th>Model</th>
                            <th>Display Name</th>
                            <th>Registered By</th>
                            <th>Registration Date</th>
                            <th class="text-center">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($printers as $printer)
                            <tr>
                                <td>{{ $printer->id }}</td>
                                <td>{{ $printer->printerType->printer_type_id ?? 'N/A' }}</td>
                                <td>{{ $printer->mac_address }}</td>
                                <td>{{ $printer->model }}</td>
                                <td>{{ $printer->display_name }}</td>
                                <td>{{ $printer->registered_by }}</td>
                                <td>{{ $printer->registration_date }}</td>
                                <td class="text-center">
                                    <div class="d-flex justify-content-center gap-2">
                                        <a href="{{ route('printers.edit', $printer->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                            <i class="fas fa-pen"></i>
                                        </a>
                                        <form action="{{ route('printers.delete', $printer->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this printer?')" class="d-inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="8" class="text-center text-muted">No printers found.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection
