<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    
     
    public function index()
    {

        $users = [
            [
                'id' => 1,
                'name' => 'Abdulrahman Hamdy',
                'room' => '2010',
                'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
                'ext' => '5605',
                'orders' => 24
            ],
            
        ];

        return view('users.index', compact('users'));
    }

    
     
     
    public function create()
    {
        return view('users.create');
    }


    
     
    public function store(Request $request)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'room' => 'required|string|max:10',
            'ext' => 'required|string|max:10',
            'email' => 'required|email|unique:users',
            'phone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $validated['image'] = $imagePath;
        }

        
        // User::create($validated);

        return redirect()->route('users.index')->with('success', 'تم إضافة المستخدم بنجاح');
    }

    
     
     
    public function show($id)
    {
        
        $user = [
            'id' => $id,
            'name' => 'Abdulrahman Hamdy',
            'room' => '2010',
            'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
            'ext' => '5605',
            'email' => 'abdulrahman@example.com',
            'phone' => '+1 234 567 890',
            'orders' => 24,
            'spending' => '$348.50',
            'reg_date' => 'June 15, 2023'
        ];

        return view('users.show', compact('user'));
    }

    
     
     
    public function edit($id)
    {
    
        $user = [
            'id' => $id,
            'name' => 'Abdulrahman Hamdy',
            'room' => '2010',
            'image' => 'https://randomuser.me/api/portraits/men/32.jpg',
            'ext' => '5605',
            'email' => 'abdulrahman@example.com',
            'phone' => '+1 234 567 890'
        ];

        return view('users.edit', compact('user'));
    }

    
     
     
    public function update(Request $request, $id)
    {
        
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'room' => 'required|string|max:10',
            'ext' => 'required|string|max:10',
            'email' => 'required|email|unique:users,email,' . $id,
            'phone' => 'required|string|max:20',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048'
        ]);

        
        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('profile_images', 'public');
            $validated['image'] = $imagePath;
        }

    

        return redirect()->route('users.index')->with('success', 'تم تحديث بيانات المستخدم بنجاح');
    }

   
    public function destroy($id)
    {
       

        return redirect()->route('users.index')->with('success', 'تم حذف المستخدم بنجاح');
    }
}