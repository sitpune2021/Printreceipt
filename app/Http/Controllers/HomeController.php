<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Printer;
use App\Models\PrinterType;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     *
     *
     *
     */




    public function index()
    {
    $userCount = User::count();
    $printerCount = Printer::count();
    $printerTypeCount = PrinterType::count();


       return view('dashbord', compact('userCount', 'printerCount', 'printerTypeCount'));
    }

    

    public function printerType()
    {
        return view('printer.printer-type');
    }





}
