<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Code extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_number', 'code', 'transaction_id', 'isUsed', 'first_name', 'last_name'
    ];
}
