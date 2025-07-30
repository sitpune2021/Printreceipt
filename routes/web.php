<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\PrinterTypeController;
use App\Http\Controllers\PrinterSettingController;
use App\Http\Controllers\PrinterController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/printer-type', [HomeController::class, 'printerType'])->name('printer.printer-type');




// Printer Types Routes
Route::get('/printer-type', [PrinterTypeController::class, 'create'])->name('printer.printer-type');
Route::post('/printer-type', [PrinterTypeController::class, 'store'])->name('printer.printer-type.store');
Route::get('/printer-type/{id}/edit', [PrinterTypeController::class, 'edit'])->name('printer.printer-type.edit');
Route::post('/printer-type/{id}/update', [PrinterTypeController::class, 'update'])->name('printer.printer-type.update');
Route::delete('/printer-type/{id}', [PrinterTypeController::class, 'destroy'])->name('printer.printer-type.destroy');






Route::get('/printer-setting', [PrinterSettingController::class, 'index'])->name('printer.printer-setting');
Route::post('/printer-setting', [PrinterSettingController::class, 'store'])->name('printer.setting.store');
Route::get('/printer-setting/{id}/edit', [PrinterSettingController::class, 'edit'])->name('printer.setting.edit');
Route::post('/printer-setting/{id}/update', [PrinterSettingController::class, 'update'])->name('printer.setting.update');
Route::delete('/printer-setting/{id}', [PrinterSettingController::class, 'destroy'])->name('printer.setting.delete');
// printers Route
Route::get('/printers', [PrinterController::class, 'index'])->name('printers.index');
Route::post('/printers/store', [PrinterController::class, 'store'])->name('printers.store');
Route::get('/printers/edit/{id}', [PrinterController::class, 'edit'])->name('printers.edit');
Route::post('/printers/update/{id}', [PrinterController::class, 'update'])->name('printers.update');
Route::get('/printers/delete/{id}', [PrinterController::class, 'destroy'])->name('printers.delete');
