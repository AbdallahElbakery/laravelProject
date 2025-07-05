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

    .category-card {
        transition: transform 0.3s ease, box-shadow 0.3s ease;
        height: 100%;
    }

    .category-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 20px rgba(0, 0, 0, 0.1);
    }

    .category-img {
        height: 180px;
        object-fit:fill;
    }

    .btn-action {
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
    <div class=" mb-4">
        <h1 class=" text-center">Categories</h1>
        <a href="{{ route('categories.create') }}" class="btn btn-primary">
            <i class="fas fa-plus "></i>Add New Category
        </a>
    </div>



    <!-- Categories Grid -->
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-3 g-4">
        <!-- Category 1 -->
        @foreach ($categories as $category)
        <div class="col-4">
            <div class="card category-card">
                <img src="{{ asset('images/catogry/' . $category->image) }}" class="card-img-top category-img" alt="{{ $category->name }}">
                <div class="card-body">
                    <h5 class="card-title">{{$category->name}}</h5>
                    <p class="card-text text-muted">{{$category->description}}</p>
                    <div class="d-flex justify-content-between align-items-center">
                        <span class="badge bg-success">Active</span>
                        <div>
                            <a class="btn btn-sm btn-outline-primary btn-action me-2" href="{{route('categories.edit',$category->id)}}">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-primary text-danger btn-action me-2"> <i class="fas fa-trash"></i>
                                </button>
                            </form>

                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach


        <!-- Pagination -->

    </div>
    <div class="mt-4">
        <div class="d-flex justify-content-center">
            {{ $categories->links() }}
        </div>
    </div>
</div>


@endsection

@section('script')
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
@endsection