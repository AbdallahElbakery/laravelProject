<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Management | Cafeteria System</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            color: #2C2C2C;
            line-height: 1.6;
        }

        .container {
            width: 100%;
            max-width: 1200px;
            margin: 0 auto;
            padding: 0 15px;
        }

        /* Header Styles */
        .header {
            background: linear-gradient(135deg, #8B4513, #D6943F);
            color: #FFFFFF;
            padding: 1rem 0;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
            position: sticky;
            top: 0;
            z-index: 100;
        }

        .nav {
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo {
            font-size: 1.8rem;
            font-weight: 700;
            font-family: 'Georgia', serif;
            color: #FFFFFF;
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        .nav-link {
            color: #F5F5DC;
            text-decoration: none;
            font-weight: 600;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            padding: 0.5rem 1rem;
            border-radius: 12px;
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: #FFFFFF;
        }

        /* Button Styles */
        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: 12px;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            display: inline-block;
            text-align: center;
            cursor: pointer;
            border: none;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, #D6943F, #CD853F);
            color: #FFFFFF;
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, #CD853F, #A0522D);
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(214, 148, 63, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid #D6943F;
            color: #D6943F;
        }

        .btn-outline:hover {
            background: #D6943F;
            color: #FFFFFF;
        }

        .btn-danger {
            background: #dc3545;
            color: #FFFFFF;
        }

        .btn-danger:hover {
            background: #c82333;
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(220, 53, 69, 0.3);
        }

        .btn-sm {
            padding: 0.4rem 0.9rem;
            font-size: 0.85rem;
        }

        /* Card Styles */
        .card {
            background: #FFFFFF;
            border-radius: 12px;
            box-shadow: 0 4px 20px rgba(0, 0, 0, 0.15);
            overflow: hidden;
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            margin-bottom: 1.5rem;
            margin-top: 2rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.25);
        }

        .card-header {
            background: linear-gradient(135deg, #8B4513, #5D4037);
            color: #FFFFFF;
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            font-family: 'Georgia', serif;
            margin: 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* Table Styles */
        .table-responsive {
            overflow-x: auto;
            border-radius: 12px;
            box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        }

        .table {
            width: 100%;
            border-collapse: collapse;
            min-width: 800px;
        }

        .table th, .table td {
            padding: 1rem;
            text-align: left;
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
        }

        .table th {
            background-color: #F5F5DC;
            color: #5D4037;
            font-weight: 600;
        }

        .table tr:hover {
            background-color: rgba(139, 69, 19, 0.05);
        }

        .user-img {
            width: 50px;
            height: 50px;
            border-radius: 50%;
            object-fit: cover;
            border: 2px solid #F5F5DC;
        }

        .action-buttons {
            display: flex;
            gap: 0.5rem;
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, #5D4037, #2C2C2C);
            color: #F5F5DC;
            padding: 2rem 0;
            margin-top: 3rem;
            text-align: center;
            border-top-left-radius: 12px;
            border-top-right-radius: 12px;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .nav-links {
                gap: 0.8rem;
                font-size: 0.9rem;
            }
        }

        @media (max-width: 768px) {
            .nav {
                flex-direction: column;
                gap: 1rem;
            }
            
            .nav-links {
                flex-wrap: wrap;
                justify-content: center;
            }
            
            .card-header {
                flex-direction: column;
                gap: 1rem;
                text-align: center;
            }
        }

        @media (max-width: 576px) {
            .action-buttons {
                flex-direction: column;
                align-items: flex-start;
            }
            
            .btn {
                width: 100%;
                margin-bottom: 0.5rem;
            }
        }

        /* Animation for table rows */
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .table tbody tr {
            animation: fadeIn 0.5s ease-out;
            animation-fill-mode: both;
        }
        
        .table tbody tr:nth-child(1) { animation-delay: 0.1s; }
        .table tbody tr:nth-child(2) { animation-delay: 0.2s; }
        .table tbody tr:nth-child(3) { animation-delay: 0.3s; }
        .table tbody tr:nth-child(4) { animation-delay: 0.4s; }
        .table tbody tr:nth-child(5) { animation-delay: 0.5s; }
        
        /* Search box */
        .search-container {
            margin-bottom: 1.5rem;
            display: flex;
            gap: 1rem;
        }
        
        .search-box {
            flex: 1;
            padding: 0.8rem 1.5rem;
            border: 1px solid #ddd;
            border-radius: 12px;
            font-size: 1rem;
            transition: all 0.3s ease;
        }
        
        .search-box:focus {
            border-color: #D6943F;
            outline: none;
            box-shadow: 0 0 0 3px rgba(214, 148, 63, 0.2);
        }
    </style>
</head>
<body>
    <!-- Header -->
    <header class="header">
        <div class="container">
            <nav class="nav">
                <a href="#" class="logo">Cafeteria System</a>
                <ul class="nav-links">
                    <li><a href="#" class="nav-link"><i class="fas fa-home"></i> Home</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-coffee"></i> Products</a></li>
                    <li><a href="#" class="nav-link active"><i class="fas fa-users"></i> Users</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-shopping-cart"></i> Manual Order</a></li>
                    <li><a href="#" class="nav-link"><i class="fas fa-file-invoice"></i> Checks</a></li>
                </ul>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="main">
        <div class="container">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">User Management</h2>
                    <div>
                        <a href="{{ route('users.create') }}" class="btn btn-outline">
                            <i class="fas fa-plus"></i> Add New User
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="search-container">
                        <input type="text" class="search-box" placeholder="Search users...">
                        <button class="btn btn-primary"><i class="fas fa-search"></i> Search</button>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Room</th>
                                    <th>Image</th>
                                    <th>Ext</th>
                                    <th>Total Orders</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($users as $user)
                                <tr>
                                    <td>{{ $user['name'] }}</td>
                                    <td>{{ $user['room'] }}</td>
                                    <td><img src="{{ $user['image'] }}" alt="User" class="user-img"></td>
                                    <td>{{ $user['ext'] }}</td>
                                    <td>{{ $user['orders'] }}</td>
                                    <td class="action-buttons">
                                        <a href="{{ route('users.show', $user['id']) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-eye"></i> View
                                        </a>
                                        <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-primary btn-sm">
                                            <i class="fas fa-edit"></i> Edit
                                        </a>
                                        <form action="{{ route('users.destroy', $user['id']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure you want to delete this user?')">
                                                <i class="fas fa-trash"></i> Delete
                                            </button>
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="pagination">
                        <button class="btn btn-outline"><i class="fas fa-chevron-left"></i> Previous</button>
                        <span>Page 1 of 3</span>
                        <button class="btn btn-outline">Next <i class="fas fa-chevron-right"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 Cafeteria Management System. All rights reserved.</p>
            <p>Designed with <i class="fas fa-heart" style="color: #CD853F;"></i> for coffee lovers</p>
        </div>
    </footer>
</body>
</html>