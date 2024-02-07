<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CategoryImage;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    public function images()
    {
        return $this->hasOne(CategoryImage::class);
    }

    public function invoice()
    {
        return $this->hasMany(Invoice::class);
    }
}
