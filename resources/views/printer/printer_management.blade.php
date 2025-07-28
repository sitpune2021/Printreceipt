
@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
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

        <div class="card-body">
            <form>
                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Printer ID</label>
                        <input type="text" class="form-control" placeholder="Enter Printer ID">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">MAC Address</label>
                        <input type="text" class="form-control" placeholder="XX:XX:XX:XX:XX:XX">
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label class="form-label">Model</label>
                        <input type="text" class="form-control" placeholder="e.g., Epson TM-T88">
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Display Name</label>
                        <input type="text" class="form-control" placeholder="Enter Display Name">
                    </div>
                </div>

                <div class="row mb-4">
                    <div class="col-md-6">
                        <label class="form-label">Registered By</label>
                        <select class="form-select">
                            <option selected disabled>-- Select User --</option>
                            <option>Admin</option>
                            <option>Operator</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label class="form-label">Registration Date</label>
                        <input type="date" class="form-control">
                    </div>
                </div>

                <div class="d-flex justify-content-between">
                    <a href="#" class="btn btn-outline-secondary">Back to List</a>
                    <div>
                        <button type="reset" class="btn btn-light me-2">Reset</button>
                        <button type="submit" class="btn btn-primary">Save Printer</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection



