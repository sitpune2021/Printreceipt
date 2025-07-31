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
        <!-- Margin Top -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">MARGIN TOP <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" name="margin_top" class="form-control form-control-lg"
                   value="{{ old('margin_top', $editData->margin_top ?? '') }}" placeholder="Margin Top">
            @error('margin_top') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Margin Bottom -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">MARGIN BOTTOM <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" name="margin_bottom" class="form-control form-control-lg"
                   value="{{ old('margin_bottom', $editData->margin_bottom ?? '') }}" placeholder="Margin Bottom">
            @error('margin_bottom') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Margin Left -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">MARGIN LEFT <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" name="margin_left" class="form-control form-control-lg"
                   value="{{ old('margin_left', $editData->margin_left ?? '') }}" placeholder="Margin Left">
            @error('margin_left') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Margin Right -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">MARGIN RIGHT <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" name="margin_right" class="form-control form-control-lg"
                   value="{{ old('margin_right', $editData->margin_right ?? '') }}" placeholder="Margin Right">
            @error('margin_right') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Font Size -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">FONT SIZE <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" name="font_size" class="form-control form-control-lg"
                   value="{{ old('font_size', $editData->font_size ?? '') }}" placeholder="Font Size">
            @error('font_size') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Line Spacing -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">LINE SPACING <span class="text-danger">*</span></label>
            <input type="number" step="0.01" min="0" name="line_spacing" class="form-control form-control-lg"
                   value="{{ old('line_spacing', $editData->line_spacing ?? '') }}" placeholder="Line Spacing">
            @error('line_spacing') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Printer Type ID -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">PRINTER TYPE ID <span class="text-danger">*</span></label>
            <select name="printer_type_id" class="form-select form-select-lg">
                <option value="">Select Printer Type</option>
                @foreach($printerTypes as $type)
                    <option value="{{ $type->id }}"
                        {{ old('printer_type_id', $editData->printer_type_id ?? '') == $type->id ? 'selected' : '' }}>
                        {{ $type->printer_type_id }}
                    </option>
                @endforeach
            </select>
            @error('printer_type_id') <small class="text-danger">{{ $message }}</small> @enderror
        </div>

        <!-- Alignment -->
        <div class="col-md-4 mb-4">
            <label class="form-label fw-semibold text-muted small">ALIGNMENT <span class="text-danger">*</span></label>
            <select name="alignment" class="form-select form-select-lg">
                <option value="">Select</option>
                @foreach (['left', 'center', 'right', 'justify'] as $align)
                    <option value="{{ $align }}" {{ old('alignment', $editData->alignment ?? '') == $align ? 'selected' : '' }}>
                        {{ ucfirst($align) }}
                    </option>
                @endforeach
            </select>
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







