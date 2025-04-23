<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            return redirect()->intended('/');  // -> rute tujuan setelah login
        }
        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ]);
    }

    public function showRegisterForm()
    {
        return view('auth.register',['role' => 'user']);  
    }

     // Proses registrasi
     public function register(Request $request)
     {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|string|min:8|confirmed', 
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {
            return redirect('/auth/register')
                        ->withErrors($validator)
                        ->withInput();
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'country' => $request->country,
            'role' => 'user',
        ]);
        // Auth()->login($user);

        return redirect()->route('welcome'); // Sesuaikan rute tujuan setelah registrasi
    }
}
