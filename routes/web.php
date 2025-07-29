<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\HomeController;
use App\Http\Controllers\PrinterManagementController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/printer-type', [HomeController::class, 'printerType'])->name('printer.printer_type');

// Route::get('/printer-management', [HomeController::class, 'printerManagement'])->name('printer.printer_managment');




Route::get('/printerManagement', [PrinterManagementController::class, 'index'])->name('printers.index');
Route::post('/printerManagement/store', [PrinterManagementController::class, 'store'])->name('printers.store');
Route::get('/printerManagement/edit/{id}', [PrinterManagementController::class, 'edit'])->name('printers.edit');
Route::post('/printerManagement/update/{id}', [PrinterManagementController::class, 'update'])->name('printers.update');
Route::get('/printerManagement/delete/{id}', [PrinterManagementController::class, 'delete'])->name('printers.delete');
