@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="mb-0">Printers List</h2>
        <a href="{{ route('printers.create') }}"     class="btn btn-dark">
            <i class="fas fa-plus-circle"></i> Add Printer
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <div class="table-responsive">
        <table class="table table-bordered">
            <thead style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%); color:white">
                <tr>
                    <th>Sr No</th>
                    <th>MAC Address</th>
                    <th>Model</th>
                    <th>Display Name</th>
                    <th>Registered By</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($printers as $printer)
                    <tr>
                        <td>{{ $printer->id }}</td>

                        <td>{{ $printer->mac_address }}</td>
                        <td>{{ $printer->model }}</td>
                        <td>{{ $printer->display_name }}</td>
                        <td>{{ $printer->registered_by }}</td>
                        <td>{{ $printer->registration_date }}</td>
                        <td>
                            <a href="{{ route('printers.edit', $printer->id) }}" class="btn btn-sm btn-outline-primary me-2" title="Edit">
                                <i class="fas fa-pen-to-square"></i>
                            </a>
                            <a href="{{ route('printers.delete', $printer->id) }}"
                               class="btn btn-sm btn-outline-danger" title="Delete"
                               onclick="return confirm('Are you sure you want to delete this printer?')">
                                <i class="fas fa-trash"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
