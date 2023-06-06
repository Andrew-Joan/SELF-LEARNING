<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.index', [
            'active' => 'register'
        ]);
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            // penulisannya bisa pakai | untuk rules berikutnya, atau dibuat jadi array dan pakai koma
            'name' => 'required|max:255',
            'username' => ['required', 'min:3', 'max:255', 'unique:users'],
            'email' => 'required|email:dns|unique:users',
            'password' => 'required|min:5|max:255',
        ]);

        // $validatedData['password'] = bcrypt($validatedData['password']);
        $validatedData['password'] = Hash::make($validatedData['password']);
        $validatedData['role_id'] = 1; // rolenya diset ke user(1) bukan ke admin(2)

        User::create($validatedData);

        return redirect('/login')->with('success', 'Registration successful! Please login'); // jadi cuma 1 baris aja
    }
}
