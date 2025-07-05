<?php

namespace App\Http\Controllers\Admin\products;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $categoryId = $request->query('category');

        $productsQuery = Product::query();

        if ($categoryId) {
            $productsQuery->where('category_id', $categoryId);
        }

        $products = $productsQuery->latest()->paginate(10);
        $categories = Category::all();

        return view('Admin.products.index', compact('products', 'categories', 'categoryId'));
    }

    public function create()
    {
        $categories = \App\Models\Category::all();
        return view('admin.products.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
            'is_available' => 'required|boolean',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
        }

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'is_available' => $request->is_available,
            'image' => $imageName,
        ]);

        return to_route('products.index')->with('success', 'Product created!');
    }


    public function edit($id)
    {
        $product = Product::findOrFail($id);
        $categories = Category::all();

        return view('Admin.products.edit', compact('product', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $product = Product::findOrFail($id);

        $request->validate([
            'name' => 'required|string',
            'description' => 'required|string|max:255',
            'price' => 'required|numeric',
            'category_id' => 'required|exists:categories,id',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'is_available' => 'nullable|boolean',
        ]);

        $imageName = $product->image;

        if ($request->hasFile('image')) {
            if ($imageName && file_exists(public_path('uploads/products/' . $imageName))) {
                unlink(public_path('uploads/products/' . $imageName));
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/products'), $imageName);
        }

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'category_id' => $request->category_id,
            'image' => $imageName,
            'is_available' => $request->has('is_available'),
        ]);

        return to_route('products.index')->with('success', 'The product has been modified successfully.');
    }


    public function destroy($id)
    {
        Product::findOrFail($id)->delete();
        return to_route('products.index')->with('success', 'The product has been removed.');
    }
}
