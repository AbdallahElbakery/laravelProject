@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Add New Product</h2>

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

                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Product Name</label>
                            <input type="text" name="name" class="form-control" value="{{ old('name') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Description</label>
                            <textarea name="description" class="form-control" rows="3" required>{{ old('description') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Price (EGP)</label>
                            <input type="number" name="price" step="0.01" class="form-control" value="{{ old('price') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Category</label>
                            <div class="d-flex gap-2">
                                <select name="category_id" class="form-select" required>
                                    <option value="">-- Choose Category --</option>
                                    @foreach($categories as $category)
                                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                    @endforeach
                                </select>
                                <a href="{{ route('categories.create') }}" class="btn btn-add">Add Category</a>
                                </a>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" name="image" accept="image/*" class="form-control">
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Availability</label>
                            <select name="is_available" class="form-select">
                                <option value="1" {{ old('is_available') == '1' ? 'selected' : '' }}>Available</option>
                                <option value="0" {{ old('is_available') == '0' ? 'selected' : '' }}>Not Available</option>
                            </select>
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Save Product</button>
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

    .btn-outline-primary {
        font-weight: bold;
        border-radius: 10px;
    }
    .btn-add {
    background: linear-gradient(135deg, #D6943F, #CD853F);
    color: white;
    padding: 0.6rem 1.2rem;
    border: none;
    text-decoration: none;
    border-radius: 10px;
    font-weight: 600;
    transition: all 0.3s ease-in-out;
}

.btn-add:hover {
    box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
}
</style>
@endsection