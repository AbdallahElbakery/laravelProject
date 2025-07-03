<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    
    public function create()
    {
        return view('admin.products.create'); 
    }
    public function store(Request $request)
{
    $validated = $request->validate([
        'name' => 'required|string|max:255',
        'description' => 'nullable|string',
        'price' => 'required|numeric',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    $imagePath = null;
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('products', 'public');
    }

    $product = Product::create([
        'name' => $validated['name'],
        'description' => $validated['description'] ?? '',
        'price' => $validated['price'],
        'image' => $imagePath ?? '',
        'is_available' => true,
    ]);

   
    if ($product) {
        return redirect()->route('products.show', $product->id)
                         ->with('success', 'Product added successfully!');
    } else {
        return back()->withInput()->withErrors(['msg' => 'Failed to add product']);
    }
}
public function show($id)
{
    $product = Product::findOrFail($id);
    return view('admin.products.show', ['products' => $product]);
}
}
