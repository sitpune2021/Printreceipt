<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use  App\Http\Controllers\HomeController;

Auth::routes();

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/printer-type', [HomeController::class, 'printerType'])->name('printer.printer_type');

Route::get('/printer-management', [HomeController::class, 'printerManagement'])->name('printer.printer_managment');
