<?php

namespace App\Http\Controllers;

use App\Models\Category;

class LayoutController extends Controller
{
    public function welcome()
    {
        $categories = Category::all();

        return view('welcome', compact('categories'));
    }
}
