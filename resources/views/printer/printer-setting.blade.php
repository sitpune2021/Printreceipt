@extends('layouts.app')

@section('content')
<div class="container my-5">
    <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
        <!-- Header -->
        <div class="card-header bg-gradient-primary py-4 text-white"
             style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
            <div class="d-flex justify-content-between align-items-center">
                <h3 class="fw-bold mb-0">Printer Settings</h3>
                <div class="bg-white rounded-3 p-2 shadow-sm">
                    <i class="fas fa-print text-primary fs-4"></i>
                </div>
            </div>
        </div>

        <!-- Body -->
        <div class="card-body p-4 p-md-5">
            @if(session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
            @endif

            <!-- Form -->
  <form method="POST" action="{{ isset($editData) ? route('printer.setting.update', $editData->id) : route('printer.setting.store') }}">
    @csrf

    <div class="row">
        @php
            $fields = [
                ['name' => 'margin_top', 'label' => 'Margin Top', 'icon' => 'arrow-up'],
                ['name' => 'margin_bottom', 'label' => 'Margin Bottom', 'icon' => 'arrow-down'],
                ['name' => 'margin_left', 'label' => 'Margin Left', 'icon' => 'arrow-left'],
                ['name' => 'margin_right', 'label' => 'Margin Right', 'icon' => 'arrow-right'],
                ['name' => 'font_size', 'label' => 'Font Size', 'icon' => 'text-height'],
                ['name' => 'line_spacing', 'label' => 'Line Spacing', 'icon' => 'text-width'],
            ];
        @endphp

        @foreach($fields as $field)
            <div class="col-md-4 mb-4">
                <label class="form-label fw-semibold text-muted small">{{ strtoupper($field['label']) }}</label>
                <div class="input-group input-group-lg">
                    <input
                        type="number"
                        step="0.01"
                        min="0"
                        name="{{ $field['name'] }}"
                        class="form-control form-control-lg"
                        value="{{ old($field['name'], $editData->{$field['name']} ?? '') }}"
                        placeholder="{{ $field['label'] }}"
                    >
                </div>
                @error($field['name']) <small class="text-danger">{{ $message }}</small> @enderror
            </div>
        @endforeach

        <!-- Printer Type -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">PRINTER TYPE ID</label>
            <div class="input-group input-group-lg">
                <select name="printer_type_id" class="form-select form-select-lg">
                    <option value="">Select Printer Type</option>
                    @foreach($printerTypes as $type)
                        <option value="{{ $type->id }}" {{ old('printer_type_id', $editData->printer_type_id ?? '') == $type->id ? 'selected' : '' }}>
                            {{ $type->printer_type_id}}
                        </option>
                    @endforeach
                </select>
            </div>
        </div>

        <!-- Alignment -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">ALIGNMENT</label>
            <div class="input-group input-group-lg">
                <select name="alignment" class="form-select form-select-lg">
                    <option value="">Select</option>
                    @foreach (['left', 'center', 'right', 'justify'] as $align)
                        <option value="{{ $align }}" {{ old('alignment', $editData->alignment ?? '') == $align ? 'selected' : '' }}>
                            {{ ucfirst($align) }}
                        </option>
                    @endforeach
                </select>
            </div>
            @error('alignment') <small class="text-danger">{{ $message }}</small> @enderror
        </div>
    </div>

    <!-- Submit Button -->
    <div class="d-flex justify-content-end border-top pt-4 mt-2">
        <button class="btn px-4 shadow-sm text-white" style="background-color: #1A3645;">
            <i class="fas fa-save me-2"></i>{{ isset($editData) ? 'Update' : 'Save' }}
        </button>
    </div>
</form>

            <!-- Divider -->
            <hr class="my-5">

            <!-- Printer Settings Table -->
            <h4 class="fw-bold mb-4">Saved Printer Settings</h4>
            @if($printerSettings->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                            <tr>
                                <th>ID</th>
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
                                    <td>{{ $setting->margin_top }}</td>
                                    <td>{{ $setting->margin_bottom }}</td>
                                    <td>{{ $setting->margin_left }}</td>
                                    <td>{{ $setting->margin_right }}</td>
                                    <td>{{ $setting->font_size }}</td>
                                    <td>{{ $setting->line_spacing }}</td>
                                    <td>{{ ucfirst($setting->alignment) }}</td>

                                    <td class="text-center">
                                        <a href="{{ route('printer.setting.edit', $setting->id) }}" class="btn btn-sm btn-outline-primary me-2">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <form action="{{ route('printer.setting.delete', $setting->id) }}" method="POST" class="d-inline"
                                              onsubmit="return confirm('Are you sure you want to delete this record?');">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn btn-sm btn-outline-danger">
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
                <div class="alert alert-info">No printer settings found.</div>
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
    .card {
        transition: transform 0.2s ease-in-out;
    }
    .card:hover {
        transform: translateY(-5px);
    }
</style>
@endpush
