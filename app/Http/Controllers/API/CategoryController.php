<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Resources\CategoryResource;
use App\Models\Category;
use App\User;

class CategoryController extends Controller
{
    public function index()
    {
        // $categories = Category::withCount(['users' => function ($query) {
        //     $query->withFilters();
        // }])
        //     ->get();
        $categories = Category::all();
        return CategoryResource::collection($categories);
    }
}
