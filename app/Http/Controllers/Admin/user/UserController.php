<?php

namespace App\Http\Controllers\Admin\user;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'user')->withCount('orders')->latest()->get();
        return view('Admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('Admin.users.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|confirmed|min:6',
            'room_number' => 'required|string|max:10',
            'role' => 'required|in:user,admin',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048', // max 2MB
        ]);

        $imageName = null;

        if ($request->hasFile('image')) {
            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/users'), $imageName);
        }

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'room_number' => $request->room_number,
            'role' => $request->role,
            'image' => $imageName,
        ]);

        return to_route('users.index')->with('success', 'User added successfully.');
    }

    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.users.edit', compact('user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $user->id,
            'password' => 'nullable|min:6|confirmed',
            'room_number' => 'required|string|max:10',
            'role' => 'required|in:user,admin',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
        ]);

        if ($validated['password']) {
            $validated['password'] = Hash::make($validated['password']);
        } else {
            unset($validated['password']);
        }

        if ($request->hasFile('image')) {
            if ($user->image && file_exists(public_path('uploads/users/' . $user->image))) {
                unlink(public_path('uploads/users/' . $user->image));
            }

            $imageName = time() . '_' . uniqid() . '.' . $request->image->extension();
            $request->image->move(public_path('uploads/users'), $imageName);
            $validated['image'] = $imageName;
        }

        $user->update($validated);

        return to_route('users.index')->with('success', 'User updated successfully.');
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);

        if ($user->role === 'admin') {
            return redirect()->route('users.index')->with('error', 'You cannot delete an admin.');
        }

        if ($user->image && file_exists(public_path('uploads/users/' . $user->image))) {
            unlink(public_path('uploads/users/' . $user->image));
        }

        $user->delete();

        return to_route('users.index')->with('success', 'User deleted successfully.');
    }
}
