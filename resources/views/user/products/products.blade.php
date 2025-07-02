@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Our Coffee Products</h2>
    <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-4">

        @php
        $products = [
            [
                'name' => 'Espresso',
                'image' => 'https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=300&q=80',
                'description' => 'Strong and bold espresso shot.',
                'price' => 15,
            ],
            [
                'name' => 'Cappuccino',
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=300&q=80',
                'description' => 'Espresso with steamed milk foam.',
                'price' => 25,
            ],
            [
                'name' => 'Latte',
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=300&q=80',
                'description' => 'Creamy latte with milk and espresso.',
                'price' => 28,
            ],
            [
                'name' => 'Americano',
                'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=300&q=80',
                'description' => 'Espresso diluted with hot water.',
                'price' => 20,
            ],
            [
                'name' => 'Mocha',
                'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=300&q=80',
                'description' => 'Chocolate-flavored coffee with milk.',
                'price' => 30,
            ],
            // نكرر الصور اللي قبل عشان نضمن عدم وجود صور مفقودة
            [
                'name' => 'Cold Brew',
                'image' => 'https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=300&q=80',
                'description' => 'Slow-steeped cold coffee.',
                'price' => 35,
            ],
            [
                'name' => 'Flat White',
                'image' => 'https://images.unsplash.com/photo-1509042239860-f550ce710b93?auto=format&fit=crop&w=300&q=80',
                'description' => 'Smooth espresso with steamed milk.',
                'price' => 26,
            ],
            [
                'name' => 'Macchiato',
                'image' => 'https://images.unsplash.com/photo-1541167760496-1628856ab772?auto=format&fit=crop&w=300&q=80',
                'description' => 'Espresso with a dash of milk foam.',
                'price' => 18,
            ],
        ];
        @endphp

        @foreach($products as $product)
        <div class="col">
            <div class="card h-100 shadow-sm">
                <img src="{{ $product['image'] }}" class="card-img-top product-img" alt="{{ $product['name'] }}">
                <div class="card-body d-flex flex-column">
                    <h5 class="card-title">{{ $product['name'] }}</h5>
                    <p class="card-text text-muted">{{ $product['description'] }}</p>
                    <div class="mt-auto">
                        <p class="fw-bold text-success mb-2">EGP {{ $product['price'] }}.00</p>
                        <a href="#" class="btn btn-primary w-100">Order Now</a>
                    </div>
                </div>
            </div>
        </div>
        @endforeach

    </div>
</div>
@endsection

@section('styles')
<style>
    .product-img {
        height: 200px;
        object-fit: cover;
    }
</style>
@endsection
