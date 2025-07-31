@extends('layouts.app')

@section('content')
<div class="container my-5">

    <!-- Header & Add Button -->
    <div class="d-flex flex-column flex-md-row justify-content-between align-items-start align-items-md-center mb-4 gap-3">
        <h3 class="fw-bold mb-0">
            <i class="bi bi-gear-fill me-2"></i>Printer Settings List
        </h3>
        <a href="{{ route('printer.printer-setting.create') }}" class="btn px-4 shadow-sm text-white" style="background-color:#1A3645;">
            <i class="bi bi-plus-circle me-2"></i>Add 
        </a>
    </div>

    <!-- Printer Settings Table -->
    @if($printerSettings->count())
        <div class="table-responsive rounded shadow-sm">
            <table class="table table-bordered align-middle mb-0">
                <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                    <tr>
                        <th>ID</th>
                        <th>Printer Type ID</th>
                        <th>Top</th>
                        <th>Bottom</th>
                        <th>Left</th>
                        <th>Right</th>
                        <th>Font</th>
                        <th>Spacing</th>
                        <th>Alignment</th>
                        <th class="text-center">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($printerSettings as $setting)
                        <tr>
                            <td>{{ $setting->id }}</td>
                            <td>{{ $setting->printerType->printer_type_id ?? 'N/A' }}</td>
                            <td>{{ $setting->margin_top }}</td>
                            <td>{{ $setting->margin_bottom }}</td>
                            <td>{{ $setting->margin_left }}</td>
                            <td>{{ $setting->margin_right }}</td>
                            <td>{{ $setting->font_size }}</td>
                            <td>{{ $setting->line_spacing }}</td>
                            <td>{{ ucfirst($setting->alignment) }}</td>
                            <td class="text-center">
                                <div class="d-flex justify-content-center gap-2">
                                    <a href="{{ route('printer.setting.edit', $setting->id) }}" class="btn btn-sm btn-outline-primary">
                                        <i class="fa fa-pencil-alt"></i>
                                    </a>
                                    <form action="{{ route('printer.setting.delete', $setting->id) }}" method="POST"
                                          onsubmit="return confirm('Are you sure you want to delete this record?');">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger">
                                            <i class="fa fa-trash-alt"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @else
        <div class="alert alert-info mt-4">No printer settings found.</div>
    @endif

</div>
@endsection
