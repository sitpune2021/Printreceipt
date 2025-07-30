<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrinterSetting;
use App\Models\PrinterType;

class PrinterSettingController extends Controller
{
    public function index()
    {
        $printerTypes = PrinterType::all();
      $printerSettings = PrinterSetting::with('printer_type')->orderBy('id')->get();
        return view('printer.printer-setting', compact('printerSettings', 'printerTypes'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'printer_type_id' => 'required|exists:printer_types,id',
            'margin_top' => 'required',
            'margin_bottom' => 'required',
            'margin_left' => 'required',
            'margin_right' => 'required',
            'font_size' => 'required',
            'line_spacing' => 'required',
            'alignment' => 'required',
        ]);

        PrinterSetting::create($request->all());

        return redirect()->route('printer.printer-setting')->with('success', 'Printer Setting Saved!');
    }

    public function edit($id)
    {
        $editData = PrinterSetting::findOrFail($id);
        $printerSettings = PrinterSetting::orderBy('id', 'asc')->get();
        $printerTypes = PrinterType::all();
        return view('printer.printer-setting', compact('editData', 'printerSettings', 'printerTypes'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'printer_type_id' => 'required|exists:printer_types,id',
            'margin_top' => 'required',
            'margin_bottom' => 'required',
            'margin_left' => 'required',
            'margin_right' => 'required',
            'font_size' => 'required',
            'line_spacing' => 'required',
            'alignment' => 'required',
        ]);

        $setting = PrinterSetting::findOrFail($id);
        $setting->update($request->all());

        return redirect()->route('printer.printer-setting')->with('success', 'Printer Setting Updated!');
    }

    public function destroy($id)
    {
        PrinterSetting::findOrFail($id)->delete();
        return redirect()->route('printer.printer-setting')->with('success', 'Printer Setting Deleted!');
    }
}
