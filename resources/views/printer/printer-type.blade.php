@extends('layouts.app')

@section('content')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <!-- Header -->
        <div class="card-header bg-gradient-primary py-4 text-white"
             style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold mb-1"><i class="bi bi-printer-fill me-2"></i>Printer Types Management</h3>
                <div class="bg-white rounded-3 p-2 shadow-sm">
                    <i class="bi bi-gear-fill text-primary fs-4"></i>
                </div>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4 p-md-5">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Create / Update Form -->
            <form action="{{ isset($editData) ? route('printer.printer-type.update', $editData->id) : route('printer.printer-type.store') }}" method="POST">
                @csrf

                <div class="row">
                    <div class="col-md-6">
                        <!-- Printer Type ID -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">PRINTER TYPE ID</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="bi bi-fingerprint text-primary"></i></span>
                                <input type="text" name="printer_type_id" class="form-control form-control-lg"
                                       value="{{ old('printer_type_id', $editData->printer_type_id ?? '') }}"
                                       placeholder="Enter Printer Type ID">
                            </div>
                            @error('printer_type_id')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Type Name -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">PRINTER TYPE NAME</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="bi bi-tag-fill text-primary"></i></span>
                                <input type="text" name="name" class="form-control form-control-lg"
                                       value="{{ old('name', $editData->name ?? '') }}"
                                       placeholder="e.g., Thermal Receipt Printer">
                            </div>
                            @error('name')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Protocol -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">COMMUNICATION PROTOCOL</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="bi bi-code-slash text-primary"></i></span>
                                <select class="form-select form-select-lg" name="protocol">
                                    <option value="" disabled {{ old('protocol', $editData->protocol ?? '') == '' ? 'selected' : '' }}>Select protocol...</option>
                                    @foreach(['ESC/POS', 'ZPL (Zebra)', 'EPL (Eltron)', 'CPCL', 'Custom'] as $option)
                                        <option value="{{ $option }}" {{ old('protocol', $editData->protocol ?? '') == $option ? 'selected' : '' }}>{{ $option }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @error('protocol')
                                <small class="text-danger">{{ $message }}</small>
                            @enderror
                        </div>

                        <!-- Status Toggle -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">STATUS</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" type="checkbox" id="statusToggle" name="status" value="1"
                                           {{ old('status', $editData->status ?? 1) == 1 ? 'checked' : '' }}>
                                    <label class="form-check-label ms-3" for="statusToggle">
                                        <span class="badge bg-success">Active</span>
                                    </label>
                                </div>
                                <span class="ms-3 small text-muted">Enable/disable this printer type</span>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Description -->
                <div class="mb-4">
                    <label class="form-label fw-semibold text-muted small">DESCRIPTION</label>
                    <textarea name="description" class="form-control form-control-lg rounded-3 shadow-sm" rows="4"
                              maxlength="250"
                              placeholder="Describe this printer type, supported models, and special features...">{{ old('description', $editData->description ?? '') }}</textarea>
                    @error('description')
                        <small class="text-danger">{{ $message }}</small>
                    @enderror
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-end align-items-center border-top pt-4 mt-2">
                    <div class="d-flex gap-3">
                        <button type="submit" class="btn px-4 shadow-sm text-white" style="background-color: #1A3645;">
                            <i class="bi bi-save me-2"></i>{{ isset($editData) ? 'Update' : 'Save' }}
                        </button>
                    </div>
                </div>
            </form>
            <!-- Divider -->
            <hr class="my-5">

            <!-- List of Printer Types -->
            <h4 class="mb-4 fw-bold">Saved Printer Types</h4>
            @if($printerTypes->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                            <tr>
                                <th>#</th>
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
                                        <a href="{{ route('printer.printer-type.edit', $type->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('printer.printer-type.destroy', $type->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this printer type?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-sm btn-outline-danger">
                                                <i class="fa fa-trash"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                <div class="alert alert-info">No printer types found.</div>
            @endif
        </div>
    </div>
</div>
@endsection

@push('styles')
<style>
    .bg-gradient-primary {
        background: linear-gradient(135deg, #3a7bd5 0%, #00d2ff 100%);
    }
    .form-control-lg, .form-select-lg, .input-group-lg .form-control {
        min-height: 50px;
    }
    .form-switch.form-switch-lg .form-check-input {
        width: 4em;
        height: 2em;
    }
    textarea {
        resize: none;
    }
    .card {
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>



@endpush
