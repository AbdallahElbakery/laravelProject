@extends('layouts.app')

@section('styles')
<style>
    /* Container and filter section styling */
    .checks-container { padding: 3rem 0; background-color: #F5F5DC; }
    .filter-section { background: #FFFFFF; padding: 1.5rem; border-radius: 12px; box-shadow: 0 5px 15px rgba(0,0,0,0.15); margin-bottom: 2rem; }
    .filter-form { display: grid; grid-template-columns: repeat(auto-fit, minmax(250px, 1fr)); gap: 1rem; }
    .filter-form .form-label { font-weight: 600; color: #5D4037; }
    .btn-filter { background: linear-gradient(135deg, #D6943F, #CD853F); color: #FFF; border:none; padding:0.75rem 1rem; border-radius:12px; cursor:pointer; transition:0.3s; }
    .btn-filter:hover { transform: translateY(-2px); }

    /* User check card styling */
    .user-check { background:#FFF; border-radius:12px; box-shadow:0 5px 15px rgba(0,0,0,0.15); margin-bottom:1.5rem; overflow:hidden; }
    .user-header { display:flex; justify-content:space-between; align-items:center; padding:1rem 1.5rem; cursor:pointer; }
    .user-header h5 { margin:0; color:#5D4037; }
    .user-header .amount { font-weight:700; color:#8B4513; }

    /* Orders list */
    .orders-list { max-height:0; overflow:hidden; transition:max-height 0.3s ease-out; }
    .user-check.active .orders-list { max-height:1000px; }
    .order-item { padding:1rem 1.5rem; border-top:1px solid #EEE; cursor:pointer; }
    .order-item:hover { background:rgba(214,148,63,0.05); }
    .order-item:first-of-type { border-top:none; }
    .order-header { display:flex; justify-content:space-between; align-items:center; }
    .order-header .date { color:#6C6C6C; font-size:0.9rem; }
    .order-header .total { font-weight:600; color:#8B4513; }

    /* Products grid */
    .products-list { max-height:0; overflow:hidden; transition:max-height 0.3s ease-out; }
    .order-item.active .products-list { max-height:500px; }
    .product-grid { display:grid; grid-template-columns:repeat(auto-fill, minmax(120px,1fr)); gap:1rem; padding:0.75rem 1.5rem; background:rgba(245,245,220,0.5); }
    .product-card { text-align:center; padding:0.75rem; background:#FFF; border-radius:12px; box-shadow:0 2px 5px rgba(0,0,0,0.1); }
    .product-card img { width:60px; height:60px; border-radius:50%; object-fit:cover; margin-bottom:0.5rem; }
    .product-card .name { font-size:0.9rem; color:#2C2C2C; }
    .product-card .price { font-size:0.8rem; font-weight:600; color:#8B4513; }
    .product-card .qty { font-size:0.8rem; color:#6C6C6C; }

    @media (max-width:768px) {
        .filter-form { grid-template-columns:1fr; }
    }
</style>
@endsection

@section('content')
<div class="checks-container">
    <div class="container">
        <!-- filter section -->
        <div class="filter-section">
            <form id="checksFilter" class="filter-form" method="GET">
                <div>
                    <label for="dateFrom" class="form-label">Date from</label>
                    <input type="date" name="dateFrom" id="dateFrom" class="form-control" value="{{ request('dateFrom') }}">
                </div>
                <div>
                    <label for="dateTo" class="form-label">Date to</label>
                    <input type="date" name="dateTo" id="dateTo" class="form-control" value="{{ request('dateTo') }}">
                </div>
                <div>
                    <label for="user" class="form-label">User</label>
                    <select name="user" id="user" class="form-control">
                        <option value="">All Users</option>
                        @foreach($allUsers as $u)
                            <option value="{{ $u->id }}" {{ request('user') == $u->id ? 'selected' : '' }}>{{ $u->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div>
                    <button type="submit" class="btn-filter">Filter</button>
                </div>
            </form>
        </div>

        <!-- users checks -->
        @foreach($users as $user)
            @php
                $total = $user->orders->flatMap->items->sum(fn($i) => $i->price * $i->quantity);
            @endphp
            <div class="user-check">
                <div class="user-header" onclick="toggleOrders(this)">
                    <h5>{{ $user->name }}</h5>
                    <span class="amount">{{ $total }} EGP</span>
                </div>
                <div class="orders-list">
                    @foreach($user->orders as $order)
                        @php
                            $orderTotal = $order->items->sum(fn($i) => $i->price * $i->quantity);
                        @endphp
                        <div class="order-item" onclick="toggleProducts(event, this)">
                            <div class="order-header">
                                <span class="date">{{ $order->created_at->format('Y/m/d h:i A') }}</span>
                                <span class="total">{{ $orderTotal }} EGP</span>
                            </div>
                            <div class="products-list">
                                <div class="product-grid">
                                    @foreach($order->items as $item)
                                        <div class="product-card">
                                            <img src="{{ asset('images/products/' . $item->product->image) }}" alt="{{ $item->product->name }}">
                                            <div class="name">{{ $item->product->name }}</div>
                                            <div class="price">{{ $item->price }} EGP</div>
                                            <div class="qty">Qty: {{ $item->quantity }}</div>
                                        </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        @endforeach
    </div>
</div>
@endsection

@section('script')
<script>
    function toggleOrders(el) {
        el.closest('.user-check').classList.toggle('active');
    }
    function toggleProducts(e, el) {
        e.stopPropagation();
        el.classList.toggle('active');
    }
    document.addEventListener('DOMContentLoaded', () => {
        document.getElementById('dateTo').value = new Date().toISOString().split('T')[0];
    });
</script>
@endsection