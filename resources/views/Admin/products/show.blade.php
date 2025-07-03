@extends('layouts.app')

@section('content')
<div class="card product-card mx-auto my-5 p-3" style="max-width: 300px; box-shadow: 0 4px 8px rgba(0,0,0,0.1); border-radius: 15px;">
    @if($products->image)
        <img src="{{ asset('storage/' . $products->image) }}" alt="Product Image" class="product-image mb-3 rounded" />
    @endif
    <div class="card-body text-center">
        <h5 class="card-title text-brown mb-2">{{ $products->name }}</h5>
        <p class="product-description text-muted mb-3">{{ $products->description ?: 'No description available.' }}</p>
        <p class="product-price fw-bold mb-2">Price: <span class="text-success">{{ number_format($products->price, 2) }} EGP</span></p>
        <p class="product-availability {{ $products->is_available ? 'text-success' : 'text-danger' }}">
            Available: {{ $products->is_available ? 'Yes' : 'No' }}
        </p>
    </div>
</div>
@endsection

@section('styles')
<style>
    .product-card {
        background-color: #fff8f0;
        border: 1px solid #deb887;
    }

    .product-image {
        width: 100%;
        height: 180px;
        object-fit: cover;
        border-radius: 12px;
        box-shadow: 0 2px 6px rgba(139, 69, 19, 0.3);
    }

    .text-brown {
        color: #8B4513;
        font-weight: 700;
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
    }

    .product-description {
        font-size: 0.9rem;
        font-style: italic;
    }

    .product-price {
        font-size: 1.1rem;
    }

    .product-availability {
        font-weight: bold;
        font-size: 1rem;
    }
</style>
@endsection
