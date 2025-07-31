@extends('layouts.app')

@section('content')
<div class="container my-5">

    <!-- Header and Add Button -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-printer-fill me-2"></i>Printer Type List
        </h3>
        <a href="{{ route('printer.printer-type.create') }}" class="btn text-white shadow-sm px-4" style="background-color:#1A3645;">
            <i class="bi bi-plus-circle me-2"></i>Add
        </a>
    </div>

    <!-- Table Section -->
    @if($printerTypes->count())
        <div class="card shadow-sm border-0 rounded-4 overflow-hidden">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-bordered table-hover align-middle mb-0">
                        <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                            <tr>
                                <th>No</th>
                                <th>Type ID</th>
                                <th>Name</th>
                                <th>Protocol</th>
                                <th>Status</th>
                                <th>Description</th>
                                <th class="text-center">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($printerTypes as $index => $type)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $type->printer_type_id }}</td>
                                    <td>{{ $type->name }}</td>
                                    <td>{{ $type->protocol }}</td>
                                    <td>
                                        @if($type->status)
                                            <span class="badge bg-success">Active</span>
                                        @else
                                            <span class="badge bg-danger">Inactive</span>
                                        @endif
                                    </td>
                                    <td>{{ $type->description }}</td>
                                    <td class="text-center">
                                        <div class="d-flex justify-content-center gap-2">
                                            <a href="{{ route('printer.printer-type.edit', $type->id) }}" class="btn btn-sm btn-outline-primary" title="Edit">
                                                <i class="fa fa-pencil"></i>
                                            </a>
                                            <form action="{{ route('printer.printer-type.destroy', $type->id) }}" method="POST" class="d-inline"
                                                  onsubmit="return confirm('Are you sure you want to delete this printer type?');">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                                    <i class="fa fa-trash"></i>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    @else
        <div class="alert alert-info mt-4">No printer types found.</div>
    @endif
</div>
@endsection
