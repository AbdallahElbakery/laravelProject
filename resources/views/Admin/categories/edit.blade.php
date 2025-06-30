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
</style>
@endsection

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header ">
                    <h4 class="mb-0">Edit Category
                    </h4>
                </div>
                <div class="card-body">
                    <form>
                        <!-- Category Information Section -->
                        <div class="mb-4">
                            <h5 class="text-primary mb-3">
                                <i class="fas fa-info-circle me-2"></i>Category Information
                            </h5>
                            <div class="row g-3">
                                <!-- Category ID (readonly) -->
                                <div class="col-md-6">
                                    <label for="categoryId" class="form-label">Category ID</label>
                                    <input type="text" class="form-control" id="categoryId" placeholder="CAT-001" readonly>
                                </div>
                                
                                <!-- Category Name -->
                                <div class="col-md-6">
                                    <label for="categoryName" class="form-label">Category Name</label>
                                    <input type="text" class="form-control" id="categoryName" placeholder="Coffe Espreso" required>
                                </div>
                                
                                
                                <!-- Description -->
                                <div class="col-12">
                                    <label for="categoryDescription" class="form-label">Description</label>
                                    <textarea class="form-control" id="categoryDescription" rows="3"></textarea>
                                </div>
                            </div>
                        </div>
                        
                        
                        <!-- Display Settings Section -->
                        <div class="mb-4">
                            <div class="row g-3">
                                <!-- Category Image -->
                                <div class="col-md-8">
                                    <label for="categoryImage" class="form-label">Category Image</label>
                                    <input class="form-control" type="file" id="categoryImage">
                                </div>
                            </div>
                        </div>
                        
                        <!-- Form Buttons -->
                        <div class="d-flex justify-content-between mt-4">
                            <button type="button" class="btn btn-outline-secondary">
                                <i class="fas fa-times me-2"></i>Cancel
                            </button>
                            <div>
                                <button type="button" class="btn btn-primary ">
                                    <i class="fas fa-trash me-2"></i>Clear All
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


