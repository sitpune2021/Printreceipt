<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrinterManagement extends Model
{
      protected $table = 'printer_management'; // ✅ correct
    protected $fillable = [
        'mac_address',
        'model',
        'display_name',
        'registered_by',
        'registration_date',
    ];
}
