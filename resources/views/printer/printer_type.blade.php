@extends('layouts.app')

@section('content')

<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <!-- Gradient Header -->
        <div class="card-header bg-gradient-primary py-4 text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <div>
                    <h3 class="fw-bold mb-1"><i class="bi bi-printer-fill me-2"></i>Printer Types Management</h3>
                </div>
                <div class="bg-white rounded-3 p-2 shadow-sm">
                    <i class="bi bi-gear-fill text-primary fs-4"></i>
                </div>
            </div>
        </div>

        <div class="card-body p-4 p-md-5">
            <form>
                <div class="row">
                    <div class="col-md-6">
                        <!-- Printer Type ID -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">PRINTER TYPE ID</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="bi bi-fingerprint text-primary"></i></span>
                                <input type="text" class="form-control form-control-lg" placeholder="Enter Printer Type ID">
                            </div>
                        </div>

                        <!-- Type Name -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">PRINTER TYPE NAME</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="bi bi-tag-fill text-primary"></i></span>
                                <input type="text" class="form-control form-control-lg" placeholder="e.g., Thermal Receipt Printer">
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <!-- Protocol -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">COMMUNICATION PROTOCOL</label>
                            <div class="input-group input-group-lg">
                                <span class="input-group-text bg-light"><i class="bi bi-code-slash text-primary"></i></span>
                                <select class="form-select form-select-lg">
                                    <option value="" selected disabled>Select protocol...</option>
                                    <option>ESC/POS</option>
                                    <option>ZPL (Zebra)</option>
                                    <option>EPL (Eltron)</option>
                                    <option>CPCL</option>
                                    <option>Custom</option>
                                </select>
                            </div>
                        </div>

                        <!-- Status Toggle -->
                        <div class="mb-4">
                            <label class="form-label fw-semibold text-muted small">STATUS</label>
                            <div class="d-flex align-items-center">
                                <div class="form-check form-switch form-switch-lg">
                                    <input class="form-check-input" type="checkbox" id="statusToggle" checked>
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
                    <textarea class="form-control form-control-lg rounded-3 shadow-sm" rows="4" maxlength="250"
                        placeholder="Describe this printer type, supported models, and special features..."></textarea>
                </div>

                <!-- Buttons -->
                <div class="d-flex justify-content-between align-items-center border-top pt-4 mt-2">
                    <button type="button" class="btn btn-outline-secondary rounded-pill px-4">
                        <i class="bi bi-arrow-left me-2"></i>Back to List
                    </button>
                    <div class="d-flex gap-3">
                        <button type="reset" class="btn btn-light rounded-pill px-4">
                            <i class="bi bi-eraser me-2"></i>Reset
                        </button>
                        <button type="submit" class="btn btn-primary rounded-pill px-4 shadow-sm">
                            <i class="bi bi-save me-2"></i>Save Printer Type
                        </button>
                    </div>
                </div>
            </form>
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
