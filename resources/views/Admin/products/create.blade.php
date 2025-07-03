@extends('layouts.app')

@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4"> Add new product </h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        
                        <div class="mb-3">
                            <label for="name" class="form-label">Product Name</label>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Enter Product Name" required>
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter Description"></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price (EGP)</label>
                            <input type="number" class="form-control" id="price" name="price" placeholder="Enter Price" required>
                        </div>

                        <div class="mb-3">
                            <label for="image" class="form-label">Image file</label>
                            <input type="file" class="form-control" id="image" name="image">
                        </div>

                        <button type="submit" class="btn btn-primary w-100">Add Product</button>
                        @if ($errors->any())
    <div class="alert alert-danger">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@if (session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif
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

    .form-control {
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
</style>
@endsection
