













        @extends('layouts.app')

@section('content')

        <!-- Printer Settings Table -->
<div class="container my-5">
   
    <!-- Header and Add Button -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold mb-0">
             Printer Setting List
        </h3>
       <a href="{{ route('printer.printer-setting.create') }}" class="btn text-white shadow-sm px-4" style="background-color:#1A3645;">
   Add 
</a>

    </div>            @if($printerSettings->count())
                <div class="table-responsive">
                    <table class="table table-bordered align-middle">
                        <thead class="text-white" style="background: linear-gradient(135deg, #00d2ff 0%, #1d2632ff 100%);">
                            <tr>
                                <th>ID</th>
                                <th>printer type id</th>
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
                                    
<td>
    {{ $setting->printerType->printer_type_id ?? 'N/A' }}
</td>
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
