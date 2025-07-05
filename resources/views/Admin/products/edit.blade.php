@extends('layouts.app')

@section('title', 'Edit Product')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Edit Product</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                    @endif

                    <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name', $product->name) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description', $product->description) }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price (EGP)</label>
                            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price', $product->price) }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <select name="category_id" class="form-select" required>
                                <option value="">-- Choose Category --</option>
                                @foreach($categories as $cat)
                                <option value="{{ $cat->id }}" {{ old('category_id', $product->category_id) == $cat->id ? 'selected' : '' }}>
                                    {{ $cat->name }}
                                </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" class="form-control" accept="image/*">
                            @if ($product->image)
                            <div class="mt-2">
                                <img src="{{ asset('storage/' . $product->image) }}" width="120" class="rounded border">
                                <p class="text-muted small mt-1">Current Image</p>
                            </div>
                            @endif
                        </div>
                        <div class="mb-4">
                            <label class="form-label">Availability</label>
                            <select name="is_available" class="form-select" required>
                                <option value="1" {{ $product->is_available ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ !$product->is_available ? 'selected' : '' }}>Unavailable</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Update Product</button>
                        <a href="{{ route('products.index') }}" class="btn btn-secondary w-100 mt-2">Cancel</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('styles')
<style>
    .form-label {
        font-weight: bold;
        color: #5D4037;
    }

    .form-control,
    .form-select {
        border-radius: 10px;
    }

    .btn-primary {
        background-color: #8B4513;
        border: none;
        font-weight: bold;
    }

    .btn-primary:hover {
        background-color: #A0522D;
    }

    .btn-secondary {
        background-color: #aaa;
        border: none;
        font-weight: bold;
    }

    .btn-secondary:hover {
        background-color: #888;
    }
</style>
@endsection