@extends('layouts.app')

@section('title', 'Product Management')

@section('styles')
<style>
    :root {
        --primary-color: #8B4513;
        --secondary-color: #D6943F;
        --accent-color: #CD853F;
        --dark-brown: #5D4037;
        --light-brown: #A0522D;
        --cream: #F5F5DC;
        --white: #FFFFFF;
        --black: #2C2C2C;
        --gray: #6C6C6C;
        --shadow: rgba(0, 0, 0, 0.15);
        --transition: all 0.3s ease-in-out;
        --border-radius: 12px;
    }

    .products-container {
        background-color: var(--cream);
        padding: 2rem 0;
    }

    .products-wrapper {
        background-color: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: 0 5px 15px var(--shadow);
    }

    .products-header {
    
        margin-bottom: 1.5rem;
    }

    .products-header h2 {
        color: var(--primary-color);
        font-weight: bold;
    }

    .btn-add {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: var(--white);
        padding: 0.7rem 1.2rem;
        border: none;
        text-decoration: none;
        border-radius: var(--border-radius);
        font-weight: 600;
        transition: var(--transition);
        position: relative;
        bottom: -60px;
        margin-bottom: -70px;
    }

    .table-products {
        width: 100%;
        border-collapse: collapse;
        min-width: 900px;
    }

    .table-products th {
        background-color: var(--accent-color);
        color: var(--cream);
        padding: 0.9rem;
        text-align: center;
    }

    .table-products td {
        padding: 0.8rem;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
        font-size: 0.95rem;
        text-align: center;
    }

    .product-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: var(--border-radius);
    }

    .action-btns {
        display: flex;
        justify-content: center;
        gap: 0.4rem;
    }

    .btn-edit,
    .btn-delete {
        border: none;
        padding: 0.4rem 0.8rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #f0ad4e;
        color: white;
    }

    .btn-delete {
        background-color: #d9534f;
        color: white;
    }

    @media (max-width: 768px) {
        .products-header {
            flex-direction: column;
            gap: 1rem;
        }

        .table-products {
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')
<div class="products-container">
    <div class="container">
        <div class="products-wrapper">
            <div class="products-header">
                <h2 class="text-center">All Products</h2>
                <a href="{{ route('products.create') }}" class="btn-add">Add New Product</a>
            </div>

            @if(session('success'))
                <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            <form method="GET" action="{{ route('products.index') }}" class="mb-3 d-flex justify-content-end">
                <select name="category" class="form-select w-auto" onchange="this.form.submit()">
                    <option value="">-- All Categories --</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ request('category') == $cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </form>

            <div class="table-responsive">
                <table class="table-products">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Category</th>
                            <th>Price</th>
                            <th>Image</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($products as $product)
                            <tr>
                                <td>{{ $product->name }}</td>
                                <td>{{ $product->description }}</td>
                                <td>{{ $product->category->name ?? '-' }}</td>
                                <td>{{ number_format($product->price, 2) }} EGP</td>
                                <td>
                                    @if($product->image)
                                        <img src="{{ asset('uploads/products/' . $product->image) }}" class="product-image" alt="Product Image">
                                    @else
                                        <span class="text-muted">No Image</span>
                                    @endif
                                </td>
                                <td>
                                    <span class="badge {{ $product->is_available ? 'bg-success' : 'bg-danger' }}">
                                        {{ $product->is_available ? 'Available' : 'Unavailable' }}
                                    </span>
                                </td>
                                <td>
                                    <div class="action-btns">
                                        <a href="{{ route('products.edit', $product->id) }}" class="btn-edit">Edit</a>
                                        <form action="{{ route('products.destroy', $product->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button class="btn-delete">Delete</button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center text-muted">No products available.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
