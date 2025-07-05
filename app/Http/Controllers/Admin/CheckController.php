<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class CheckController extends Controller
{
    public function index(Request $request)
    {
        // all data from users with their orders and items
        $query = User::with(['orders.items.product']);

        // filter by user
        if ($request->filled('user')) {
            $query->where('id', $request->user);
        }

        // filter by date range
        if ($request->filled('dateFrom')) {
            $query->whereHas('orders', fn($q) =>
                $q->whereDate('created_at', '>=', $request->dateFrom)
            );
        }

        if ($request->filled('dateTo')) {
            $query->whereHas('orders', fn($q) =>
                $q->whereDate('created_at', '<=', $request->dateTo)
            );
        }

        $users    = $query->get();
        $allUsers = User::select('id', 'name')->get();

        return view('Admin.checks.checks', compact('users', 'allUsers'));
    }
}
