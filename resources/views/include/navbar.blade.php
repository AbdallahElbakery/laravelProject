<link rel="stylesheet" href="{{asset('css/navbar.css')}}">

<nav class="navbar navbar-expand-lg" style="background-color: #5D4037;">
    <div class="container-fluid">
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <i class="fas fa-bars" style="color: #F5F5DC;"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav me-auto">
                <li class="nav-item">
                    <a class="nav-link active" href="#" style="color: #F5F5DC;">Home</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="/products" style="color: #F5F5DC;">Product</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #F5F5DC;">Users</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="login.html" style="color: #F5F5DC;">Manual Order</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #F5F5DC;">Checks</a>
                </li>
            </ul>
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link" href="#" style="color: #F5F5DC;"><i class="fas fa-user"></i></a>
                </li>
            </ul>
        </div>
    </div>
</nav>
<style>
  .navbar {
    padding: 1rem 0;
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