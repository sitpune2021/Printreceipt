<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Printer;
use Illuminate\Support\Facades\Auth;
use App\Models\PrinterType;


class PrinterController extends Controller
{
    public function index()
{
    $printers = Printer::with('printerType')->get(); // printerType relationship load केलीये
    $printerTypes = PrinterType::all();
    
    return view('printer.printers', compact('printers', 'printerTypes'));

    
}


    public function store(Request $request)
    {
        $request->validate([
            'mac_address' => [
                'required',
                'regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
                'unique:printers,mac_address'
            ],
            'model' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
        ]);
Printer::create([
    // Inside store:
    'printer_type_id' => $request->printer_type_id,
    'mac_address' => $request->mac_address,
    'model' => $request->model,
    'display_name' => $request->display_name,
    'registered_by' => Auth::user()->name ?? 'Admin',
    'registration_date' => now()->toDateString(),
]);

        return redirect()->route('printers.index')->with('success', 'Printer added successfully.');
    }

public function edit($id)
{
    $printer = Printer::findOrFail($id);
    $printers = Printer::all();
    $printerTypes = PrinterType::all();
    return view('printer.printers', compact('printer', 'printers', 'printerTypes'));
}
    public function update(Request $request, $id)
    {
        $printer = Printer::findOrFail($id);

        $request->validate([
            'mac_address' => [
                'required',
                'regex:/^([0-9A-Fa-f]{2}[:-]){5}([0-9A-Fa-f]{2})$/',
                'unique:printers,mac_address,' . $id,
            ],
            'model' => 'required|string|max:255',
            'display_name' => 'required|string|max:255',
        ]);

     $printer->update([
        // Inside store:
    'printer_type_id' => $request->printer_type_id,
    'mac_address' => $request->mac_address,
    'model' => $request->model,
    'display_name' => $request->display_name,
    'registered_by' => Auth::user()->name ?? 'Admin',
    'registration_date' => now()->toDateString(),
]);

        return redirect()->route('printers.index')->with('success', 'Printer updated successfully.');
    }

    public function destroy($id)
{
    $printer = Printer::findOrFail($id);
    $printer->delete();

    return redirect()->route('printers.index')->with('success', 'Printer deleted successfully.');
}


}
