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
    .category-card 
    {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }
    .category-card:hover 
    {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0,0,0,0.1);
    }
    .category-img 
    {
        height: 180px;
        object-fit: cover;
    }
    .btn-action 
    {
        width: 40px;
        height: 40px;
        display: inline-flex;
        align-items: center;
        justify-content: center;
    }
</style>
@endsection

@section('content')
<div class="container py-5">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h1 class="mb-0">Categories</h1>
            <a href="{{ url('/Admin/categories/create') }}" class="btn btn-primary">
                <i class="fas fa-plus me-2"></i>Add New Category
            </a>
        </div>
        
        <!-- Search and Filter Row -->
        <div class="row mb-4">
            <div class="col-md-6">
                <div class="input-group">
                    <input type="text" class="form-control" placeholder="Search categories...">
                    <button class="btn btn-outline-secondary" type="button">
                        <i class="fas fa-search"></i>
                    </button>
                </div>
            </div>
            <div class="col-md-6">
                <select class="form-select">
                    <option selected>Filter by status</option>
                    <option>Active</option>
                    <option>Inactive</option>
                </select>
            </div>
        </div>
        
        <!-- Categories Grid -->
        <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
            <!-- Category 1 -->
            <div class="col">
                <div class="card category-card">
                    <img src="{{asset('images/catogry/CoffeCategory.jpg')}}" class="card-img-top category-img" alt="Electronics">
                    <div class="card-body">
                        <h5 class="card-title">Coffe</h5>
                        <p class="card-text text-muted"></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Active</span>
                            <div>
                                <button class="btn btn-sm btn-outline-primary btn-action me-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger btn-action">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Category 2 -->
            <div class="col">
                <div class="card category-card">
                    <img src="{{asset('images/catogry/JuiceCategory.avif')}}" class="card-img-top category-img" alt="Clothing">
                    <div class="card-body">
                        <h5 class="card-title">Juice</h5>
                        <p class="card-text text-muted"></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-success">Active</span>
                            <div>
                                <button class="btn btn-sm btn-outline-primary btn-action me-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger btn-action">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <!-- Category 3 -->
            <div class="col">
                <div class="card category-card">
                    <img src="{{asset('images/catogry/DesertCategory.jpg')}}" class="card-img-top category-img" alt="Furniture">
                    <div class="card-body">
                        <h5 class="card-title">Desert</h5>
                        <p class="card-text text-muted"></p>
                        <div class="d-flex justify-content-between align-items-center">
                            <span class="badge bg-warning text-dark">Inactive</span>
                            <div>
                                <button class="btn btn-sm btn-outline-primary btn-action me-2">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-outline-danger btn-action">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer bg-transparent">
                        <small class="text-muted">Last updated: 2 days ago</small>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Pagination -->
        <nav class="mt-5">
            <ul class="pagination justify-content-center">
                <li class="page-item disabled">
                    <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                </li>
                <li class="page-item active"><a class="page-link" href="#">1</a></li>
                <li class="page-item"><a class="page-link" href="#">2</a></li>
                <li class="page-item"><a class="page-link" href="#">3</a></li>
                <li class="page-item">
                    <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
    </div>
    
@endsection

@section('script')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection
