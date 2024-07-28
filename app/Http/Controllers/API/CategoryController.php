<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Http\Resources\CategoryResourceCollection;

class CategoryController extends Controller
{
    public function categories()
    {
        $categories = Category::orderBy('name', 'desc')->get();

        return new CategoryResourceCollection($categories);
    }
}
