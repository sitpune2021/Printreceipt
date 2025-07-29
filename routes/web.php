<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\PrinterManagementController;
use App\Http\Controllers\PrinterTypeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');


Route::get('/printer-type', [HomeController::class, 'printerType'])->name('printer.printer-type');



Route::get('/printerManagement', [PrinterManagementController::class, 'index'])->name('printers.index');
Route::post('/printerManagement/store', [PrinterManagementController::class, 'store'])->name('printers.store');
Route::get('/printerManagement/edit/{id}', [PrinterManagementController::class, 'edit'])->name('printers.edit');
Route::post('/printerManagement/update/{id}', [PrinterManagementController::class, 'update'])->name('printers.update');
Route::get('/printerManagement/delete/{id}', [PrinterManagementController::class, 'delete'])->name('printers.delete');
Route::get('/printer-management', [HomeController::class, 'printerManagement'])->name('printer.printer_managment');

// Printer Types Routes
Route::get('/printer-type', [PrinterTypeController::class, 'create'])->name('printer.printer-type');
Route::post('/printer-type', [PrinterTypeController::class, 'store'])->name('printer.printer-type.store');
Route::get('/printer-type/{id}/edit', [PrinterTypeController::class, 'edit'])->name('printer.printer-type.edit');
Route::post('/printer-type/{id}/update', [PrinterTypeController::class, 'update'])->name('printer.printer-type.update');
Route::delete('/printer-type/{id}', [PrinterTypeController::class, 'destroy'])->name('printer.printer-type.destroy');


