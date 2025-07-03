<?php

namespace App\Http\Controllers\Admin;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->paginate(10);
    return view('Admin.categories.index', compact('categories'));
    }    

    public function create()
    {
        return view ('Admin.categories.create');
    }

    public function edit()
    {
        return view ('Admin.categories.edit');
    }
}
