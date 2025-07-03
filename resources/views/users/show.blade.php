<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Details - {{ $user['name'] }}</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <style>
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
            --light-gray: #f8f9fa;
            --shadow: rgba(0, 0, 0, 0.15);
            --hover-shadow: rgba(0, 0, 0, 0.25);
            --transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
            --border-radius: 12px;
            --font-primary: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            --font-secondary: 'Georgia', serif;
        }

        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            font-family: var(--font-primary);
            background-color: var(--light-gray);
            color: var(--black);
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
            background: linear-gradient(135deg, var(--primary-color), var(--secondary-color));
            color: var(--white);
            padding: 1rem 0;
            box-shadow: 0 4px 12px var(--shadow);
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
            font-family: var(--font-secondary);
            color: var(--white);
            text-decoration: none;
        }

        .nav-links {
            display: flex;
            list-style: none;
            gap: 1.5rem;
        }

        .nav-link {
            color: var(--cream);
            text-decoration: none;
            font-weight: 600;
            transition: var(--transition);
            padding: 0.5rem 1rem;
            border-radius: var(--border-radius);
        }

        .nav-link:hover, .nav-link.active {
            background: rgba(255, 255, 255, 0.2);
            color: var(--white);
        }

        /* Button Styles */
        .btn {
            padding: 0.6rem 1.5rem;
            border-radius: var(--border-radius);
            font-weight: 600;
            text-decoration: none;
            transition: var(--transition);
            display: inline-block;
            text-align: center;
            cursor: pointer;
            border: none;
            font-size: 0.9rem;
        }

        .btn-primary {
            background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
            color: var(--white);
        }

        .btn-primary:hover {
            background: linear-gradient(135deg, var(--accent-color), var(--light-brown));
            transform: translateY(-3px);
            box-shadow: 0 8px 15px rgba(214, 148, 63, 0.3);
        }

        .btn-outline {
            background: transparent;
            border: 2px solid var(--secondary-color);
            color: var(--secondary-color);
        }

        .btn-outline:hover {
            background: var(--secondary-color);
            color: var(--white);
        }

        /* Card Styles */
        .card {
            background: var(--white);
            border-radius: var(--border-radius);
            box-shadow: 0 4px 20px var(--shadow);
            overflow: hidden;
            transition: var(--transition);
            margin-bottom: 1.5rem;
        }

        .card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 30px var(--hover-shadow);
        }

        .card-header {
            background: linear-gradient(135deg, var(--primary-color), var(--dark-brown));
            color: var(--white);
            padding: 1rem 1.5rem;
            font-weight: 600;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .card-title {
            font-size: 1.5rem;
            font-weight: 600;
            font-family: var(--font-secondary);
            margin: 0;
        }

        .card-body {
            padding: 1.5rem;
        }

        /* User Details Styles */
        .user-details-grid {
            display: grid;
            grid-template-columns: 1fr 2fr;
            gap: 2rem;
        }

        .user-profile {
            text-align: center;
            padding: 1.5rem;
            background: var(--cream);
            border-radius: var(--border-radius);
        }

        .profile-img {
            width: 200px;
            height: 200px;
            border-radius: 50%;
            object-fit: cover;
            border: 5px solid var(--white);
            margin: 0 auto 1rem;
            box-shadow: 0 4px 15px var(--shadow);
        }

        .user-info {
            display: grid;
            grid-template-columns: repeat(2, 1fr);
            gap: 1.5rem;
            margin-top: 1.5rem;
        }

        .info-item {
            background: var(--white);
            padding: 1rem;
            border-radius: var(--border-radius);
            box-shadow: 0 2px 8px rgba(0,0,0,0.05);
        }

        .info-label {
            font-weight: 600;
            color: var(--primary-color);
            margin-bottom: 0.5rem;
            font-size: 0.9rem;
        }

        .info-value {
            font-size: 1.1rem;
            color: var(--black);
        }

        /* Footer Styles */
        .footer {
            background: linear-gradient(135deg, var(--dark-brown), var(--black));
            color: var(--cream);
            padding: 2rem 0;
            margin-top: 3rem;
            text-align: center;
        }

        /* Responsive Design */
        @media (max-width: 992px) {
            .user-details-grid {
                grid-template-columns: 1fr;
            }
            
            .user-info {
                grid-template-columns: 1fr;
            }
            
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

        /* Utilities */
        .mt-1 { margin-top: 0.5rem; }
        .mt-2 { margin-top: 1rem; }
        .mt-3 { margin-top: 1.5rem; }
        .mt-4 { margin-top: 2rem; }
        .action-buttons {
            display: flex;
            gap: 0.8rem;
            margin-top: 2rem;
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
                    <h2 class="card-title">User Details</h2>
                    <div>
                        <a href="{{ route('users.index') }}" class="btn btn-outline">
                            <i class="fas fa-arrow-left"></i> Back to Users
                        </a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="user-details-grid">
                        <div class="user-profile">
                            <img src="{{ $user['image'] }}" alt="User" class="profile-img">
                            <h3>{{ $user['name'] }}</h3>
                            <p>Room: {{ $user['room'] }}</p>
                        </div>
                        
                        <div class="user-details">
                            <div class="user-info">
                                <div class="info-item">
                                    <div class="info-label">Full Name</div>
                                    <div class="info-value">{{ $user['name'] }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Room</div>
                                    <div class="info-value">{{ $user['room'] }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Extension</div>
                                    <div class="info-value">{{ $user['ext'] }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Email</div>
                                    <div class="info-value">{{ $user['email'] }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Phone</div>
                                    <div class="info-value">{{ $user['phone'] }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Registration Date</div>
                                    <div class="info-value">{{ $user['reg_date'] }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Total Orders</div>
                                    <div class="info-value">{{ $user['orders'] }}</div>
                                </div>
                                <div class="info-item">
                                    <div class="info-label">Total Spending</div>
                                    <div class="info-value">{{ $user['spending'] }}</div>
                                </div>
                            </div>
                            
                            <div class="action-buttons">
                                <a href="{{ route('users.edit', $user['id']) }}" class="btn btn-primary">
                                    <i class="fas fa-edit"></i> Edit User
                                </a>
                                <a href="{{ route('users.index') }}" class="btn btn-outline">
                                    <i class="fas fa-list"></i> Back to List
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>

    <!-- Footer -->
    <footer class="footer">
        <div class="container">
            <p>&copy; 2023 Cafeteria Management System. All rights reserved.</p>
        </div>
    </footer>
</body>
</html>