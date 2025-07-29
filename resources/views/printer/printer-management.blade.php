@extends('layouts.app')

@section('content')
<div class="container mt-4">
    <div class="card shadow-sm border-0">
        <div class="card-header bg-gradient-primary text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
            <h4 class="mb-0">{{ isset($printer) ? 'Edit Printer' : 'Add New Printer' }}</h4>
        </div>

        <div class="card-body">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <form method="POST" action="{{ isset($printer) ? route('printers.update', $printer->id) : route('printers.store') }}">
                @csrf
          
              

                    <div class="col">
                        <label>MAC Address</label>
                        <input type="text" name="mac_address" class="form-control @error('mac_address') is-invalid @enderror" value="{{ $printer->mac_address ?? old('mac_address') }}" >
                        @error('mac_address')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

                <div class="row mb-3">
                    <div class="col">
                        <label>Model</label>
                        <input type="text" name="model" class="form-control @error('model') is-invalid @enderror" value="{{ $printer->model ?? old('model') }}" >
                        @error('model')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="col">
                        <label>Display Name</label>
                        <input type="text" name="display_name" class="form-control @error('display_name') is-invalid @enderror" value="{{ $printer->display_name ?? old('display_name') }}" >
                        @error('display_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                </div>

            <div class="row mb-3">
    <div class="col">
        <label>Registered By</label>
        <input type="text" name="registered_by" class="form-control" 
               value="{{ Auth::user()->name }}" readonly>
    </div>
    <div class="col">
        <label>Registration Date</label>
        <input type="text" name="registration_date" class="form-control" 
               value="{{ now()->toDateString() }}" readonly>
    </div>
</div>


                <div class="text-end">
                    <button type="submit" class="btn" style="background-color: #1A3645; color: white;">
                        {{ isset($printer) ? 'Update' : 'Save' }}
                    </button>
                </div>

            </form>
        </div>
    </div>

    <div class="mt-5">
        <h4>Printer List</h4>
        <table class="table table-bordered mt-3">
            <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                <tr>
                    <th>No.</th>
                    <th>Printer ID</th>
                    <th>MAC Address</th>
                    <th>Model</th>
                    <th>Display Name</th>
                    <th>Registered By</th>
                    <th>Registration Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($printers as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->printer_id }}</td>
                    <td>{{ $item->mac_address }}</td>
                    <td>{{ $item->model }}</td>
                    <td>{{ $item->display_name }}</td>
                   <td>{{ $item->registered_by }}</td>
                    <td>{{ $item->registration_date }}</td>

                    <td class="text-center">
                        <a href="{{ route('printers.edit', $item->id) }}" class="btn btn-sm btn-outline-primary me-2" title="Edit">
                            <i class="fas fa-edit"></i>
                        </a>
                        <form action="{{ route('printers.delete', $item->id) }}" method="GET" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this printer?');">
                            @csrf
                            <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                <i class="fas fa-trash-alt"></i>
                            </button>
                        </form>
                    </td>
                </tr>
                @empty
                <tr>
                    <td colspan="8" class="text-center">No printers found</td>
                </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
