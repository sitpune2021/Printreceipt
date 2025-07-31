<?php

// app/Models/PrinterSetting.php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PrinterSetting extends Model
{
    protected $fillable = [
        'printer_type_id',
        'margin_top',
        'margin_bottom',
        'margin_left',
        'margin_right',
        'font_size',
        'line_spacing',
        'alignment',
    ];

    // ✅ Add this method to fix the error:
    public function printerType()
    {
        return $this->belongsTo(PrinterType::class, 'printer_type_id');
    }
}
