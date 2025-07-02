@extends('layouts.app')

@section('styles')
<style>
    /* Consistent with the existing brand identity */
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
        --font-primary: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        --font-secondary: 'Georgia', serif;
    }

    .checks-container {
        padding: 3rem 0;
        background-color: var(--cream);
    }

    .filter-section {
        background-color: var(--white);
        padding: 2rem;
        border-radius: var(--border-radius);
        box-shadow: 0 5px 15px var(--shadow);
        margin-bottom: 2rem;
    }

    .filter-form {
        display: grid;
        grid-template-columns: repeat(auto-fit, minmax(250px, 1fr));
        gap: 1.5rem;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--dark-brown);
        font-weight: 600;
    }

    .form-control {
        width: 100%;
        padding: 0.75rem;
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        font-family: var(--font-primary);
        transition: var(--transition);
    }

    .form-control:focus {
        border-color: var(--secondary-color);
        box-shadow: 0 0 0 3px rgba(214, 148, 63, 0.2);
        outline: none;
    }

    .btn-filter {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: var(--white);
        border: none;
        padding: 0.75rem 1.5rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        align-self: flex-end;
    }

    .btn-filter:hover {
        background: linear-gradient(135deg, var(--accent-color), var(--secondary-color));
        transform: translateY(-2px);
    }

    .user-checks {
        background-color: var(--white);
        border-radius: var(--border-radius);
        box-shadow: 0 5px 15px var(--shadow);
        overflow: hidden;
    }

    .user-check {
        border-bottom: 1px solid #eee;
        padding: 1.5rem;
        cursor: pointer;
        transition: var(--transition);
    }

    .user-check:last-child {
        border-bottom: none;
    }

    .user-check:hover {
        background-color: rgba(139, 69, 19, 0.05);
    }

    .user-check.active {
        background-color: rgba(139, 69, 19, 0.1);
    }

    .user-info {
        display: flex;
        justify-content: space-between;
        align-items: center;
    }

    .user-name {
        font-weight: 600;
        color: var(--dark-brown);
        font-size: 1.1rem;
    }

    .total-amount {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 1.2rem;
    }

    .orders-container {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .orders-container.show {
        max-height: 1000px;
    }

    .order-item {
        padding: 1.5rem;
        margin-top: 1rem;
        background-color: rgba(245, 245, 220, 0.5);
        border-radius: var(--border-radius);
        cursor: pointer;
    }

    .order-header {
        display: flex;
        justify-content: space-between;
        margin-bottom: 0.5rem;
    }

    .order-date {
        color: var(--gray);
        font-size: 0.9rem;
    }

    .order-amount {
        font-weight: 600;
        color: var(--primary-color);
    }

    .products-container {
        max-height: 0;
        overflow: hidden;
        transition: max-height 0.3s ease-out;
    }

    .products-container.show {
        max-height: 500px;
    }

    .product-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 1rem;
        margin-top: 1rem;
    }

    .product-card {
        text-align: center;
        padding: 1rem;
        background-color: var(--white);
        border-radius: var(--border-radius);
        box-shadow: 0 2px 5px var(--shadow);
    }

    .product-img {
        width: 60px;
        height: 60px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 0.5rem;
    }

    .product-name {
        font-size: 0.9rem;
        color: var(--black);
        margin-bottom: 0.3rem;
    }

    .product-price {
        font-size: 0.8rem;
        color: var(--primary-color);
        font-weight: 600;
    }

    .product-quantity {
        font-size: 0.8rem;
        color: var(--gray);
    }

    @media (max-width: 768px) {
        .filter-form {
            grid-template-columns: 1fr;
        }
        
        .user-info {
            flex-direction: column;
            align-items: flex-start;
            gap: 0.5rem;
        }
        
        .product-grid {
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
        }
    }
</style>
@endsection

@section('content')
<div class="checks-container">
    <div class="container">
        <!-- filter section -->
        <div class="filter-section">
            <form class="filter-form"  id="checksFilter" method="GET" >   <!-- action="{{ route('checks.filter') }}"-->
                <div class="form-group">
                    <label for="dateFrom">Date from</label>
                    <input type="date" class="form-control" id="dateFrom" name="dateFrom">
                </div>
                <div class="form-group">
                    <label for="dateTo">Date to</label>
                    <input type="date" class="form-control" id="dateTo" name="dateTo" >
                </div>
                <div class="form-group">
                    <label for="user">User</label>
                    <select class="form-control" id="user" name="user">
                        <option value="">All Users</option>
                        <option value="1">Abdulrahman Hamdy</option>
                        <option value="2">Islam Askar</option>
                        <option value="3">Saved Fatty</option>
                    </select>
                </div>
                <button type="submit" class="btn-filter">Filter</button>
            </form>
        </div>

        <!-- users checks  -->
        <div class="user-checks">
            <!-- user check 1 -->
            <div class="user-check" onclick="toggleOrders(this)">
                <div class="user-info">
                    <div class="user-name">Abdulrahman Hamdy</div>
                    <div class="total-amount">110 EGP</div>
                </div>
                
                <div class="orders-container">
                    <!-- order 1 -->
                    <div class="order-item" onclick="toggleProducts(event, this)">
                        <div class="order-header">
                            <div class="order-date">2015/02/02 10:30 AM</div>
                            <div class="order-amount">55 EGP</div>
                        </div>
                        
                        <div class="products-container">
                            <div class="product-grid">
                                <div class="product-card">
                                    <img src="{{ asset('images/products/tea.jpg') }}" alt="Tea" class="product-img">
                                    <div class="product-name">Tea</div>
                                    <div class="product-price">5 EGP</div>
                                    <div class="product-quantity">Qty: 1</div>
                                </div>
                                <div class="product-card">
                                    <img src="{{ asset('images/products/coffee.jpg') }}" alt="Coffee" class="product-img">
                                    <div class="product-name">Coffee</div>
                                    <div class="product-price">6 EGP</div>
                                    <div class="product-quantity">Qty: 1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- order 2 -->
                    <div class="order-item" onclick="toggleProducts(event, this)">
                        <div class="order-header">
                            <div class="order-date">2015/02/01 11:30 AM</div>
                            <div class="order-amount">20 EGP</div>
                        </div>
                        
                        <div class="products-container">
                            <div class="product-grid">
                                <div class="product-card">
                                    <img src="{{ asset('images/products/nescafe.jpg') }}" alt="Nescafe" class="product-img">
                                    <div class="product-name">Nescafe</div>
                                    <div class="product-price">8 EGP</div>
                                    <div class="product-quantity">Qty: 1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <!-- repeate data user check 1 -->
            <div class="user-check" onclick="toggleOrders(this)">
                <div class="user-info">
                    <div class="user-name">Abdulrahman Hamdy</div>
                    <div class="total-amount">110 EGP</div>
                </div>
                
                <div class="orders-container">
                    <!-- order 1 -->
                    <div class="order-item" onclick="toggleProducts(event, this)">
                        <div class="order-header">
                            <div class="order-date">2015/02/02 10:30 AM</div>
                            <div class="order-amount">55 EGP</div>
                        </div>
                        
                        <div class="products-container">
                            <div class="product-grid">
                                <div class="product-card">
                                    <img src="{{ asset('images/products/tea.jpg') }}" alt="Tea" class="product-img">
                                    <div class="product-name">Tea</div>
                                    <div class="product-price">5 EGP</div>
                                    <div class="product-quantity">Qty: 1</div>
                                </div>
                                <div class="product-card">
                                    <img src="{{ asset('images/products/coffee.jpg') }}" alt="Coffee" class="product-img">
                                    <div class="product-name">Coffee</div>
                                    <div class="product-price">6 EGP</div>
                                    <div class="product-quantity">Qty: 1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <!-- order 2 -->
                    <div class="order-item" onclick="toggleProducts(event, this)">
                        <div class="order-header">
                            <div class="order-date">2015/02/01 11:30 AM</div>
                            <div class="order-amount">20 EGP</div>
                        </div>
                        
                        <div class="products-container">
                            <div class="product-grid">
                                <div class="product-card">
                                    <img src="{{ asset('images/products/nescafe.jpg') }}" alt="Nescafe" class="product-img">
                                    <div class="product-name">Nescafe</div>
                                    <div class="product-price">8 EGP</div>
                                    <div class="product-quantity">Qty: 1</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    // Toggle user's orders visibility
    function toggleOrders(element) {
        // Close all other open user checks first
        document.querySelectorAll('.user-check').forEach(check => {
            if (check !== element) {
                check.classList.remove('active');
                check.querySelector('.orders-container').classList.remove('show');
            }
        });
        
        // Toggle current user check
        element.classList.toggle('active');
        const ordersContainer = element.querySelector('.orders-container');
        ordersContainer.classList.toggle('show');
    }

    // Toggle products visibility for an order
    function toggleProducts(event, element) {
        event.stopPropagation(); // Prevent triggering the parent's click event
        
        // Close all other open products in the same user check
        const userCheck = element.closest('.user-check');
        userCheck.querySelectorAll('.order-item').forEach(item => {
            if (item !== element) {
                item.querySelector('.products-container').classList.remove('show');
            }
        });
        
        // Toggle current order's products
        const productsContainer = element.querySelector('.products-container');
        productsContainer.classList.toggle('show');
    }

    // today's date as default for "dateTo"
    document.addEventListener('DOMContentLoaded', function() {
        const today = new Date().toISOString().split('T')[0];
        document.getElementById('dateTo').value = today;
    });
</script>
@endsection