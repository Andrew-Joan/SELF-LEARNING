<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function index()
    {
        return view('login.index', [
            'active' => 'login'
        ]);
    }
    
    // langsung divalidasiin sama laravel, kita ga perlu cek manual
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required|email', // email:dns klau mau lbh ketat lagi verifikasinya
            'password' => 'required'
        ]);

        if(Auth::attempt($credentials)) // jika benar, maka akan masuk ke sini
        {
            $request->session()->regenerate(); // untuk ngelindungin lagi dari session fixation(hacker2)

            $roleCheck = User::where('email', $credentials['email'])->value('role_id');
            return redirect()->intended($roleCheck == 1 ? '/' : '/admin');
        }

        // ngecek tanpa fitur bawaan laravel (cek manual)
        // $user = User::where('email', $credentials['email'])->first();

        // if ($user && Hash::check($credentials['password'], $user->password)) {
        //     return redirect()->intended('/')
        // }

        // jika salah kita return usernya ke halaman login dan kasih pesan login failed
        return back()->with('loginError', 'Login failed!');
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
