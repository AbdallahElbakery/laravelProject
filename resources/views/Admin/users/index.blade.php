@extends('layouts.app')

@section('styles')
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
        --shadow: rgba(0, 0, 0, 0.15);
        --transition: all 0.3s ease-in-out;
        --border-radius: 12px;
    }

    * {
        text-decoration: none;
    }

    .users-container {
        background-color: var(--cream);
        padding: 2rem 0;
    }

    .users-wrapper {
        background-color: var(--white);
        border-radius: var(--border-radius);
        padding: 2rem;
        box-shadow: 0 5px 15px var(--shadow);
    }

    .users-header {
    
        margin-bottom: 1.5rem;
    }

    .users-header h2 {
        color: var(--primary-color);
        font-weight: bold;
    }

    .btn-add {
        background: linear-gradient(135deg, var(--secondary-color), var(--accent-color));
        color: var(--white);
        padding: 0.6rem 1.2rem;
        border: none;
        text-decoration: none;
        border-radius: var(--border-radius);
        font-weight: 600;
        transition: var(--transition);
    }

    .btn-add:hover {
        box-shadow: 0 0 10px var(--hover-shadow);
    }

    .table-users {
        width: 100%;
        border-collapse: collapse;
        min-width: 800px;
    }

    .table-users th {
        background-color: var(--accent-color);
        color: var(--cream);
        padding: 0.9rem;
        text-align: left;
    }

    .table-users td {
        padding: 0.8rem;
        border-bottom: 1px solid #eee;
        vertical-align: middle;
        font-size: 0.95rem;
    }

    .user-image {
        width: 50px;
        height: 50px;
        object-fit: cover;
        border-radius: 50%;
    }

    .action-btns {
        display: flex;
        gap: 0.4rem;
    }

    .btn-edit,
    .btn-delete {
        border: none;
        padding: 0.4rem 0.8rem;
        border-radius: var(--border-radius);
        font-weight: 600;
        font-size: 0.85rem;
        cursor: pointer;
        text-decoration: none;
    }

    .btn-edit {
        background-color: #f0ad4e;
        color: white;
    }

    .btn-delete {
        background-color: #d9534f;
        color: white;
    }

    @media (max-width: 768px) {
        .users-header {
            flex-direction: column;
            gap: 1rem;
        }

        .table-users {
            font-size: 0.85rem;
        }
    }
</style>
@endsection

@section('content')
<div class="users-container">
    <div class="container">
        <div class="users-wrapper">
            <div class="users-header">
                <h2 class="text-center">All Users</h2>
                <a href="{{ route('users.create') }}" class="btn-add">Add New User</a>
            </div>

            @if(session('success'))
            <div class="alert alert-success text-center">{{ session('success') }}</div>
            @endif

            @if(session('error'))
            <div class="alert alert-danger text-center">{{ session('error') }}</div>
            @endif

            <div class="table-responsive">
                <table class="table-users">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Room</th>
                            <th>Orders</th>
                            <th>Joined At</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>
                                @if($user->image)
                                <img src="{{ asset('uploads/users/' . $user->image) }}" class="user-image" alt="User Image">
                                @else
                                <span class="text-muted">No Image</span>
                                @endif
                            </td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ $user->room_number }}</td>
                            <td>{{ $user->orders_count }}</td>
                            <td>{{ $user->created_at->format('Y-m-d') }}</td>
                            <td>
                                <div class="action-btns">
                                    <a href="{{ route('users.edit', $user->id) }}" class="btn-edit">Edit</a>

                                    <form action="{{ route('users.destroy', $user->id) }}" method="POST" >
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn-delete">Delete</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="8" class="text-center">No users found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection