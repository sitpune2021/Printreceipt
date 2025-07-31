<?php

namespace App\Http\Controllers;



use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\PrinterType;
use App\Http\Controllers\Controller;




class PrinterTypeController extends Controller
{
    public function create()
    {
       $printerTypes = PrinterType::orderBy('created_at', 'asc')->get(); // ascending order
        return view('printer.printer-type', compact('printerTypes'));
    }
public function createForm()
{
    return view('printer.printer-type-create');
}
    public function store(Request $request)
    {
        $validated = $request->validate([
            'printer_type_id' => 'required|string|max:255|unique:printer_types,printer_type_id',
            'name' => 'required|string|max:255',
            'protocol' => 'required|string|max:255',
            'description' => 'nullable|string|max:250',
        ], [
            'printer_type_id.required' => 'The Printer Type ID is required.',
            'printer_type_id.unique'   => 'The Printer Type ID must be unique.',
            'name.required'            => 'The Printer Type Name is required.',
            'protocol.required'        => 'Select the Communication Protocol is required.',
            'description.max'          => 'The Description cannot exceed 250 characters.',
        ]);

        $validated['status'] = $request->has('status') ? 1 : 0;

        PrinterType::create($validated);

        return redirect()->route('printer.printer-type')->with('success', 'Saved successfully!');

    }

    public function edit($id)
    {
       $printerTypes = PrinterType::orderBy('created_at', 'asc')->get();
        $editData = PrinterType::findOrFail($id);

        return view('printer.printer-type-create', compact('printerTypes', 'editData'));
    }

    public function update(Request $request, $id)
    {
        $printer = PrinterType::findOrFail($id);

        $request->validate([
            'printer_type_id' => [
                'required',
                'string',
                'max:255',
                Rule::unique('printer_types', 'printer_type_id')->ignore($id),
            ],
            'name' => 'required|string|max:255',
            'protocol' => 'required|string|max:255',
            'description' => 'nullable|string|max:250',
        ], [
            'printer_type_id.required' => 'The Printer Type ID is required.',
            'printer_type_id.unique'   => 'The Printer Type ID must be unique.',
            'name.required'            => 'The Printer Type Name is required.',
            'protocol.required'        => 'Select the Communication Protocol is required.',
            'description.max'          => 'Description cannot exceed 250 characters.',
        ]);

        $printer->update([
            'printer_type_id' => $request->printer_type_id,
            'name' => $request->name,
            'protocol' => $request->protocol,
            'description' => $request->description,
            'status' => $request->has('status') ? 1 : 0,
        ]);

        return redirect()->route('printer.printer-type')->with('success', 'Printer Type updated successfully!');
    }

    public function destroy($id)
    {
        $printer = PrinterType::findOrFail($id);
        $printer->delete();

        return redirect()->route('printer.printer-type')->with('success', 'Printer Type deleted successfully!');
    }
}
