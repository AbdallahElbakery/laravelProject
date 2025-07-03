@extends('./layouts.app')

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
        --hover-shadow: rgba(0, 0, 0, 0.25);
        --transition: all 0.3s ease;
        --border-radius: 12px;
        --font-primary: 'serif';
        --font-secondary: 'Georgia', serif;
    }
</style>
@endsection

@section('content')
<div class="container my-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h4 class="mb-0 text-center">Edit Category</h4>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('categories.update', $category->id) }}" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <!-- Category Info -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-info-circle me-2"></i>Category Information
                            </h5>
                            <div class="row g-3">
                                <div class="col-md-6">
                                    <label for="categoryId" class="form-label">Category ID</label>
                                    <input type="text" class="form-control" id="categoryId" value="{{ $category->id }}" readonly>
                                </div>
                                <div class="col-md-6">
                                    <label for="categoryName" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" name="name" value="{{ old('name', $category->name) }}" required>
                                </div>
                                <div class="col-12">
                                    <label for="categoryDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="categoryDescription" name="description" rows="3">{{ old('description', $category->description) }}</textarea>
                                </div>
                            </div>
                        </div>

                        <!-- Category Image -->
                        <div class="mb-4">
                            <div class="row g-3">
                                <div class="col-md-8">
                                    <label for="categoryImage" class="form-label">Category Image</label>
                                    <input class="form-control" type="file" id="categoryImage" name="image">
                                    @if($category->image)
                                        <img src="{{ asset('images/catogry/' . $category->image) }}" alt="Category Image" class="img-thumbnail mt-2" style="height: 100px;">
                                    @endif
                                </div>
                            </div>
                        </div>

                        <!-- Buttons -->
                        <div class="d-flex justify-content-start mt-4">
                            <a href="{{ route('categories.index') }}" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </a>
                            <div>
                                <button type="reset" class="btn btn-danger">
                                    <i class="fas fa-trash me-2"></i>Clear
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="fas fa-save me-2"></i>Save Changes
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
