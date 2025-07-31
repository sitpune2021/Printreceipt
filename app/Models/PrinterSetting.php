<?php

// app/Models/PrinterSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrinterSetting extends Model
{
  
    
    protected $fillable = [
    'margin_top',
    'margin_bottom',
    'margin_left',
    'margin_right',
    'font_size',
    'line_spacing',
    'printer_type_id',
    'alignment'
];


    // ✅ Add this method to fix the error:
    public function printerType()
    {
        return $this->belongsTo(PrinterType::class, 'printer_type_id');
    }
}
