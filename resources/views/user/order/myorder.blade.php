@extends('layouts.app')

@section('styles')
<style>
    /* Consistent with brand identity */
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

    .orders-container {
        padding: 1.5rem 0;
        background-color: var(--cream);
    }

    .filter-section {
        background-color: var(--white);
        padding: 1.5rem;
        border-radius: var(--border-radius);
        box-shadow: 0 5px 15px var(--shadow);
        margin-bottom: 1.5rem;
    }

    .filter-form {
        display: flex;
        flex-wrap: wrap;
        gap: 1rem;
    }

    .form-group {
        flex: 1 1 200px;
        min-width: 0;
    }

    .form-group label {
        display: block;
        margin-bottom: 0.5rem;
        color: var(--dark-brown);
        font-weight: 600;
        font-size: 0.95rem;
    }

    .form-control {
        width: 100%;
        padding: 0.7rem;
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        font-family: var(--font-primary);
        transition: var(--transition);
        font-size: 0.95rem;
    }

    .btn-filter {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: var(--white);
        border: none;
        padding: 0.7rem 1.25rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        cursor: pointer;
        transition: var(--transition);
        height: auto;
        flex: 0 0 auto;
        align-self: flex-end;
        font-size: 0.95rem;
    }

    .orders-table-wrapper {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
        background-color: var(--white);
        border-radius: var(--border-radius);
        box-shadow: 0 5px 15px var(--shadow);
    }

    .orders-table {
        width: 100%;
        min-width: 600px;
        border-collapse: collapse;
    }

    .orders-table th {
        background-color: var(--accent-color);
        color: var(--cream);
        padding: 0.9rem;
        text-align: left;
        font-family: var(--font-secondary);
        font-size: 0.95rem;
    }

    .orders-table td {
        padding: 0.9rem;
        border-bottom: 1px solid rgba(93, 64, 55, 0.1);
        vertical-align: middle;
        font-size: 0.9rem;
    }

    .order-details {
        background-color: rgba(245, 245, 220, 0.5);
        padding: 1.25rem;
        border-radius: var(--border-radius);
        margin-top: 0.5rem;
        display: none;
    }

    .order-details.show {
        display: block;
        animation: fadeIn 0.3s ease-out;
    }

    .order-total {
        font-weight: 700;
        color: var(--primary-color);
        font-size: 1rem;
        margin-bottom: 1rem;
    }

    .products-grid {
        display: grid;
        grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
        gap: 0.8rem;
    }

    .product-card {
        background-color: var(--white);
        border-radius: var(--border-radius);
        padding: 0.8rem;
        text-align: center;
        box-shadow: 0 2px 5px var(--shadow);
    }

    .product-img {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
        margin-bottom: 0.4rem;
    }

    .product-name {
        font-weight: 600;
        color: var(--black);
        margin-bottom: 0.2rem;
        font-size: 0.85rem;
    }

    .product-price {
        color: var(--primary-color);
        font-weight: 600;
        font-size: 0.85rem;
    }

    .product-quantity {
        color: var(--gray);
        font-size: 0.8rem;
    }

    .action-btns {
        display: flex;
        flex-wrap: wrap;
        gap: 0.4rem;
    }

    .btn-action {
        padding: 0.4rem 0.8rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.8rem;
        transition: var(--transition);
        border: none;
        cursor: pointer;
        white-space: nowrap;
    }

    /* Responsive Adjustments */
    @media (max-width: 768px) {
        .filter-form {
            flex-direction: column;
            gap: 0.8rem;
        }

        .form-group {
            flex: 1 1 auto;
            width: 100%;
        }

        .btn-filter {
            width: 100%;
            align-self: stretch;
        }

        .orders-table th,
        .orders-table td {
            padding: 0.7rem;
        }

        .products-grid {
            grid-template-columns: repeat(auto-fill, minmax(100px, 1fr));
            gap: 0.6rem;
        }
    }

    @media (max-width: 480px) {
        .orders-container {
            padding: 1rem 0.5rem;
        }

        .filter-section {
            padding: 1rem;
        }

        .product-card {
            padding: 0.6rem;
        }

        .product-img {
            width: 40px;
            height: 40px;
        }

        .action-btns {
            flex-direction: column;
        }

        .btn-action {
            width: 100%;
        }
    }
</style>
@endsection

@section('content')
<div class="orders-container">
    <div class="container">
        <!-- Filter Section -->
        <h3 class="text-center py-4">My Order</h3>

        <!-- Orders Table -->
        <div class="orders-table-wrapper">
            <table class="orders-table">
                <thead>
                    <tr>
                        <th>Order Date</th>
                        <th>name</th>
                        <th>Room</th>
                        <th>Items</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Order 1 -->
                    <tr onclick="toggleOrderDetails(this)">
                        <td>2015/02/02 10:30 AM</td>
                        <td>ahmed</td>
                        <td>2006</td>
                        <td>3</td>
                        <td>Pending</td>

                        <td>
                            <div class="action-btns">
                            
                                <button class="btn-action btn-cancel">❌</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="order-details">
                                <div class="order-total">Total: EGP 34</div>

                                <div class="products-grid">
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Tea" class="product-img">
                                        <div class="product-name">Tea</div>
                                        <div class="product-price">5 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Coffee" class="product-img">
                                        <div class="product-name">Coffee</div>
                                        <div class="product-price">6 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Nescafe" class="product-img">
                                        <div class="product-name">Nescafe</div>
                                        <div class="product-price">8 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Cola" class="product-img">
                                        <div class="product-name">Cola</div>
                                        <div class="product-price">10 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>


                    <!-- Order 2 -->
                    <tr onclick="toggleOrderDetails(this)">
                        <td>2015/02/02 10:30 AM</td>
                        <td>ahmed</td>
                        <td>2006</td>
                        <td>4</td>
                        <td>Pending</td>
                        <td>
                            <div class="action-btns">
                           
                                <button class="btn-action btn-cancel">❌</button>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6">
                            <div class="order-details">
                                <div class="order-total">Total: EGP 34</div>

                                <div class="products-grid">
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Tea" class="product-img">
                                        <div class="product-name">Tea</div>
                                        <div class="product-price">5 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Coffee" class="product-img">
                                        <div class="product-name">Coffee</div>
                                        <div class="product-price">6 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Nescafe" class="product-img">
                                        <div class="product-name">Nescafe</div>
                                        <div class="product-price">8 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                    <div class="product-card">
                                        <img src="{{ asset('images/orders.png') }}" alt="Cola" class="product-img">
                                        <div class="product-name">Cola</div>
                                        <div class="product-price">10 EGP</div>
                                        <div class="product-quantity">Qty: 1</div>
                                    </div>
                                </div>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@section('script')
<script>
    function toggleOrderDetails(row) {
        const detailsRow = row.nextElementSibling;
        const details = detailsRow.querySelector('.order-details');

        // Close all other open details
        document.querySelectorAll('.order-details').forEach(item => {
            if (item !== details) {
                item.classList.remove('show');
            }
        });

        // Toggle current details
        details.classList.toggle('show');
    }
</script>
@endsection