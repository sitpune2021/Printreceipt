<?php

namespace App\Http\Controllers;

use App\Models\PrinterManagement;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class PrinterManagementController extends Controller
{
    public function index()
    {
        $printers = PrinterManagement::all();
        return view('printer.printer-management', compact('printers'));
    }

public function store(Request $request)
{
    $request->validate([

        'mac_address' => [
            'required',
            'regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
            'unique:printer_management,mac_address',
        ],
        'model' => 'required',
        'display_name' => 'required',
    ]);

    PrinterManagement::create([
        'mac_address' => $request->mac_address,
        'model' => $request->model,
        'display_name' => $request->display_name,
        'registered_by' => Auth::user()->name,
        'registration_date' => now()->toDateString(),
    ]);

    return redirect()->route('printers.index')->with('success', 'Printer saved successfully.');
}



    public function edit($id)
    {
        $printer = PrinterManagement::findOrFail($id);
        $printers = PrinterManagement::all();
        return view('printer.printer-management', compact('printer', 'printers'));
    }

  public function update(Request $request, $id)
{
    $request->validate([
       
        'mac_address' => [
            'required',
            'regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
            'unique:printer_management,mac_address,' . $id,
        ],
        'model' => 'required',
        'display_name' => 'required',
        'registered_by' => 'required',
        'registration_date' => 'required|date',
    ], [
        'printer_id.required' => 'Printer ID is required.',
        'printer_id.unique' => 'This Printer ID is already taken.',
        'printer_id.regex' => 'Printer ID can only contain letters, numbers, and dashes (-).',

        'mac_address.required' => 'MAC Address is required.',
        'mac_address.regex' => 'Please enter a valid MAC Address (e.g. AA:BB:CC:DD:EE:FF).',
        'mac_address.unique' => 'This MAC Address is already registered.',

        'model.required' => 'Model is required.',
        'display_name.required' => 'Display Name is required.',
        
    ]);

    $printer = PrinterManagement::findOrFail($id);
    $printer->update([
    'printer_id' => $request->printer_id,
    'mac_address' => $request->mac_address,
    'model' => $request->model,
    'display_name' => $request->display_name,
    'registered_by' => Auth::user()->name,
    'registration_date' => now()->toDateString(),
]);


    return redirect()->route('printers.index')->with('success', 'Printer updated successfully.');
}


    public function delete($id)
    {
        $printer = PrinterManagement::findOrFail($id);
        $printer->delete();

        return redirect()->route('printers.index')->with('success', 'Printer deleted successfully.');
    }
}
