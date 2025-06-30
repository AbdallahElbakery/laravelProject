<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    // public function index()
    // {
    //     return view ('Admin.categories.index');
    // }

    public function create()
    {
        return view ('Admin.categories.create');
    }

    public function edit()
    {
        return view ('Admin.categories.edit');
    }
}
