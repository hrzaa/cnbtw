<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    
    public function index()
    {
        $categories = Category::take(6)
            ->get();

            return view('pages.home', [
                'categories' => $categories
            ]);
    }

}
