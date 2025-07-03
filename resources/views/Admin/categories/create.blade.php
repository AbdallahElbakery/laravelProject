@extends('./layouts.app')

@section('styles')
<style>
    /* Root Variables for Brand Identity */
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
        --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        --border-radius: 12px;
        --font-primary: 'serif';
        --font-secondary: 'Georgia', serif;
    }

    .form-container {
        max-width: 800px;
        margin: 0 auto;
        padding: 30px;
        border-radius: 10px;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
        background-color: #fff;
    }

    .form-header {
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
        margin-bottom: 30px;
    }

    .image-preview {
        width: 100%;
        height: 200px;
        border: 2px dashed #ddd;
        border-radius: 5px;
        display: flex;
        align-items: center;
        justify-content: center;
        overflow: hidden;
        margin-bottom: 15px;
    }

    .image-preview img {
        max-width: 100%;
        max-height: 100%;
        object-fit: cover;
    }

    .required-field::after {
        content: " *";
        color: red;
    }
 
</style>
@endsection

@section('content')
<div class="container py-5">
    <div class="form-container">
        <div class="form-header">
            <h2 class="mb-0 text-center">Add New Category</h2>
            <p class="text-muted">Fill in the details below to create a new product category</p>
        </div>

        <form method="post" action="{{route('categories.store')}}" enctype="multipart/form-data">
            @csrf
            <!-- Basic Information Section -->
            <fieldset class="mb-4">
                <legend class="fw-bold fs-5 mb-3"><i class="fas fa-info-circle me-2"></i>Basic Information</legend>

                <div class="row mb-3">
                    <div class="col-md-6">
                        <label for="categoryName" class="form-label required-field">Category Name</label>
                        <input type="text" class="form-control" id="categoryName" name="name" placeholder="Enter category name" required>
                        <div class="form-text">This will be displayed to users</div>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Description</label>
                    <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter a brief description of this category"></textarea>
                    <div class="form-text">This will help users understand what this category includes</div>
                </div>
            </fieldset>

            <!-- Visual Representation Section -->
            <fieldset class="mb-4">

                <div class="mb-3">
                    <label for="categoryImage" class="form-label">Category Image</label>
                    <div class="image-preview" id="imagePreview">
                        <span class="text-muted">No image selected</span>
                    </div>
                    <input class="form-control" type="file" id="categoryImage" name="image" accept="image/*">
                    <div class="form-text">Recommended size: 800x600px. Will be cropped to square ratio.</div>
                </div>

            </fieldset>

            <!-- Form Actions -->
            <div class="d-flex justify-content-start">
                <button type="button" class="btn btn-outline-secondary">
                    <i class="fas fa-times me-2"></i>Cancel
                </button>
                <div class="ff">
                    <button type="submit" class="btn btn-primary">
                        <i class="fas fa-check me-2"></i>Create Category
                    </button>
                </div>
            </div>
        </form>
    </div>
</div>



@endsection

@section('script')

<script>
    const categoryImageInput = document.getElementById('categoryImage');
    const imagePreview = document.getElementById('imagePreview');

    categoryImageInput.addEventListener('change', function() {
        const file = this.files[0];

        if (file) {
            const reader = new FileReader();

            reader.addEventListener('load', function() {
                imagePreview.innerHTML = `<img src="${this.result}" alt="Image Preview" style="max-width: 100%; height: auto; border-radius: 8px;" />`;
            });

            reader.readAsDataURL(file);
        } else {
            imagePreview.innerHTML = `<span class="text-muted">No image selected</span>`;
        }
    });
</script>

@endsection