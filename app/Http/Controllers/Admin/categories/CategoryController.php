<?php

namespace App\Http\Controllers\Admin\categories;

use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::latest()->paginate(3);
        return view('Admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('Admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
public function store(Request $request)
{
    $request->validate([
        'name' => 'required|unique:categories,name',
        'description' => ['required', 'string', 'min:5'],
        'image' => ['required', 'image', 'mimes:jpeg,png,jpg,gif', 'max:2048'], // يُفضل تحديد النوع
    ]);

    $filename = null;

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/catogry'), $filename);
    }

    Category::create([
        'name' => $request->name,
        'description' => $request->description,
        'image' => $filename,
    ]);

    return to_route('categories.index')->with('success', 'Category created successfully.');
}

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $category = Category::findOrFail($id);
    return view('Admin.categories.edit', compact('category'));    }

    /**
     * Update the specified resource in storage.
     */
public function update(Request $request, string $id)
{
    $request->validate([
        'name' => 'required|unique:categories,name,' . $id,
        'description' => 'required|string|min:5',
        'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048'
    ]);

    $category = Category::findOrFail($id);

    $data = [
        'name' => $request->name,
        'description' => $request->description,
    ];

    if ($request->hasFile('image')) {
        $file = $request->file('image');
        $filename = time() . '.' . $file->getClientOriginalExtension();
        $file->move(public_path('images/catogry'), $filename);
        $data['image'] = $filename;


    }

    $category->update($data);

    return to_route('categories.index')->with('success', 'Category updated successfully.');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
 $category = Category::findOrFail($id);
    $category->delete();

    return to_route('categories.index')->with('success', 'Category deleted successfully.');  
  }
}
