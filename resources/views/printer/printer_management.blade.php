@extends('layouts.app')

@section('content')

<div class="container py-4">
    <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
        <!-- Header -->
        <div class="card-header bg-light py-3 border-bottom">
            <div class="d-flex justify-content-between align-items-center">
                <h4 class="mb-0 fw-semibold">
                    <i class="bi bi-printer me-2 text-primary"></i> Printer Details
                </h4>
                <span class="badge bg-primary bg-opacity-10 text-primary fs-6">
                    ID: 1
                </span>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4">
            <div class="row g-4">
                <!-- Left Column -->
                <div class="col-md-6">
                    <!-- Printer Identification -->
                    <div class="border rounded-3 p-3 h-100">
                        <h6 class="fw-semibold mb-3 text-muted d-flex align-items-center">
                            <i class="bi bi-upc-scan me-2 text-primary"></i> Printer Identification
                        </h6>

                        <div class="mb-3">
                            <label class="form-label text-muted small mb-1">Printer ID</label>
                            <div class="fs-5 fw-semibold">1</div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label text-muted small mb-1">MAC Address</label>
                            <div class="font-monospace">XX:XX:XX:XX:XX:XX</div>
                        </div>
                    </div>
                </div>

                <!-- Right Column -->
                <div class="col-md-6">
                    <!-- Model Information -->
                    <div class="border rounded-3 p-3 h-100">
                        <h6 class="fw-semibold mb-3 text-muted d-flex align-items-center">
                            <i class="bi bi-tags me-2 text-primary"></i> Model Information
                        </h6>

                        <div class="mb-3">
                            <label class="form-label text-muted small mb-1">Display Name</label>
                            <div class="fs-5 fw-semibold">Office Printer Pro</div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label text-muted small mb-1">Registered By</label>
                            <div class="fw-medium">Admin User</div>
                        </div>

                        <div class="mb-0">
                            <label class="form-label text-muted small mb-1">Registration Date</label>
                            <div class="fw-medium">2024-04-24</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Bar -->
            <div class="mt-4 p-3 bg-light bg-opacity-50 rounded-3">
                <div class="d-flex align-items-center justify-content-between">
                    <div>
                        <span class="badge bg-success bg-opacity-10 text-success">
                            <i class="bi bi-check-circle-fill me-1"></i> Online
                        </span>
                        <span class="text-muted small ms-3">Last active: 2 minutes ago</span>
                    </div>
                    <button class="btn btn-sm btn-outline-secondary">
                        <i class="bi bi-arrow-clockwise"></i> Refresh Status
                    </button>
                </div>
            </div>
        </div>

        <!-- Footer Actions -->
        <div class="card-footer bg-light py-3 border-top">
            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-secondary">
                    <i class="bi bi-arrow-left me-1"></i> Back to List
                </button>
                <div>
                    <button class="btn btn-outline-danger me-2">
                        <i class="bi bi-trash me-1"></i> Remove
                    </button>
                    <button class="btn btn-primary">
                        <i class="bi bi-pencil-fill me-1"></i> Edit Details
                    </button>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
