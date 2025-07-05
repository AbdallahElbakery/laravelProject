<link rel="stylesheet" href="{{asset('css/navbar.css')}}">

<nav class="navbar navbar-expand-lg" style="background-color: #5D4037;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="color: #F5F5DC;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="{{route('home.page')}}" style="color: #F5F5DC;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('products.index')}}" style="color: #F5F5DC;">Products</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('users.index')}}" style="color: #F5F5DC;">Users</a>
                </li>

                <li class="nav-item">
                    <a class="nav-link" href="login.html" style="color: #F5F5DC;">Manual Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('categories.index')}}" style="color: #F5F5DC;">categories</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/checks" style="color: #F5F5DC;">Checks</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/orders" style="color: #F5F5DC;">All Orders</a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #F5F5DC;">products</a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #F5F5DC;">Cart</a>
                </li>
                                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #F5F5DC;">My Oeders</a>
                </li>
            </ul>

            <ul class="navbar-nav mx-5 ">
                <!-- Authentication Links -->
                @guest
                @if (Route::has('login'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('login') }}" style="color: #F5F5DC;"><i class="fas fa-user"></i></a>
                </li>
                @endif


                @else
                <li> <img class="img-person rounded-circle " width="40" height="40" src="{{ asset('images/user/' . Auth::user()->image) }}" alt="Author Image"></li>
                <li class="nav-item dropdown">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle text-light" href="#" role="button" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }}
                    </a>

                    <div class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
<style>
    .navbar {
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
    }

    .nav-link {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        font-weight: 500;
        padding: 0.5rem 1rem;
        transition: all 0.3s ease;
    }

    .nav-link:hover {
        color: #D6943F !important;
    }

    .navbar-toggler {
        border: none;
        padding: 0.5rem;
    }

    @media (max-width: 992px) {
        .navbar-collapse {
            padding-top: 1rem;
        }
    }
</style>