<?php

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
        'alignment',
    ];

    public function printer_type()
    {
        return $this->belongsTo(PrinterType::class, 'printer_type_id');
    }
}
