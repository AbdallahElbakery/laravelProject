@extends('layouts.app')
@section('styles')
<style>
    body {
        background-color: #f8f9fa;
    }

    .form-label {
        font-weight: bold;
        color: #5D4037;
    }

    .form-control {
        border-radius: 10px;
    }

    .btn-success {
        background-color: #8B4513;
        border: none;
        font-weight: bold;
    }

    .btn-success:hover {
        background-color: #A0522D;
    }
</style>
@endsection
@section('content')
<div class="container my-5">
    <h2 class="text-center mb-4">Edit Product</h2>

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card shadow-sm">
                <div class="card-body">
                    <form action="#" method="POST">
                        {{-- <input type="hidden" name="_method" value="PUT"> --}}
                        {{-- @csrf --}}

                       
                        <div class="mb-3">
                            <label for="name" class="form-label">Prouduct Name</label>
                            <input type="text" class="form-control" id="name" name="name" value="Espresso" required>
                        </div>

                        
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" rows="3">Strong and bold espresso shot.</textarea>
                        </div>

                        
                        <div class="mb-3">
                            <label for="price" class="form-label">Price (EGP)</label>
                            <input type="number" class="form-control" id="price" name="price" value="15" required>
                        </div>

                        
                        <div class="mb-3">
                            <label for="image" class="form-label">Image link</label></label>
                            <input type="url" class="form-control" id="image" name="image" value="https://images.unsplash.com/photo-1511920170033-f8396924c348?auto=format&fit=crop&w=300&q=80">
                        </div>

                        
                        <button type="submit" class="btn btn-success w-100">Save edits </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection


