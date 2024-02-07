<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class InvoiceExcelImage extends Model
{
    use HasFactory;

    protected $fillable = [
        'invoice_id',
        'invoice_excel'
    ];
}
