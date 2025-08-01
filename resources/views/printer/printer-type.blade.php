@extends('layouts.app')

@section('content')
<div class="d-flex justify-content-between align-items-center mb-3">
    <h4 class="fw-bold">Printer Type List</h4>
    <a href="{{ route('printer.printer-type.create') }}" class="btn btn-dark">Add</a>
</div>

@if($printerTypes->count())
    <div class="table-responsive">
        <table class="table table-bordered align-middle">
            <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                <tr>
                    <th>Sr No</th>
                    <th>Name</th>
                    <th>Protocol</th>
                    <th>Description</th>
                    <th class="text-center">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($printerTypes as $index => $type)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $type->name }}</td>
                        <td>{{ $type->protocol }}</td>
                        
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
@endsection
