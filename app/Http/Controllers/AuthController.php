<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use SweetAlert2\Laravel\Swal;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;


class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string|min:8',
        ]);

        if ($validator->fails()) {
            Swal::fire([
                'title' => 'Login Failed',
                'text' => 'Please check your input and try again !',
                'icon' => 'error',
                'confirmButtonText' => 'Retry'
            ]);
            return redirect('/auth/login')
                        ->withErrors($validator)
                        ->withInput();
        }



        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {

            Swal::fire([
                'title' => 'Login Successful',
                'text' => 'Congratulations, you have successfully logged in!',
                'icon' => 'success',
                'confirmButtonText' => 'Cool'
            ]);
            return redirect()->intended('/');  // -> rute tujuan setelah login
        }
        Swal::fire([
            'title' => 'Login Failed',
            'text' => 'Email or password is incorrect, please try again !',
            'icon' => 'error',
            'confirmButtonText' => 'Retry'
        ]);
        return back();
    }

    public function showRegisterForm()
    {
        return view('auth.register',['role' => 'user']);
    }

    public function logout(){
        Auth::logout();
        Swal::fire([
            'title' => 'Logout Successful',
            'text' => 'You have successfully logged out.',
            'icon' => 'success',
            'confirmButtonText' => 'Okay'
        ]);
        return redirect('/auth/login');
    }

     // Proses registrasi
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'phone' => 'required|numeric|digits_between:10,15',
            'password' => 'required|string|min:8|confirmed',
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
        ]);

        // Jika validasi gagal
        if ($validator->fails()) {

            if ($validator->errors()->has('password')) {
                $message = $validator->errors()->first('password');

                if (str_contains($message, 'confirmation')) {
                    $validator->errors()->add('password_confirmation', $message);
                    $validator->errors()->forget('password');
                }
            }

            Swal::fire([
                'title' => 'Registration Failed',
                'text' => 'Please check your input and try again.',
                'icon' => 'error',
                'confirmButtonText' => 'Retry'
            ]);
            return redirect('/auth/register')
                        ->withErrors($validator)
                        ->withInput();

        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'city' => $request->city,
            'country' => $request->country,
            'role' => 'user',
        ]);

        Auth::login($user);

        Swal::fire([
            'title' => 'Registration Successful',
            'text' => 'You have successfully registered!',
            'icon' => 'success',
            'confirmButtonText' => 'Okay'
        ]);
         // Redirect to login page
        return redirect()->route('index');
    }

    public function edit()
    {
        return view('auth.edit');
    }

    public function update(Request $request){
        $authUser = Auth::user();
        $user = User::find($authUser->id);



        // Cek dulu password lama
        if (!Hash::check($request->password_old, $user->password)) {
            Swal::fire([
                'title' => 'Update Failed',
                'text' => 'Old password does not match !',
                'icon' => 'error',
                'confirmButtonText' => 'Retry'
            ]);
             // Redirect back with error
            return back()->withErrors(['password_old' => 'Password does not match !'])->withInput();
        }

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'phone' => 'required|numeric|digits_between:10,15',
            'email' => [
                'required',
                'email',
                Rule::unique('users')->ignore($authUser->id),
            ],
            'city' => 'required|string|max:100',
            'country' => 'required|string|max:100',
            'image' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
        ]);

        if ($validator->fails()) {
            Swal::fire([
                'title' => 'Update Failed',
                'text' => 'Please check your input and try again.',
                'icon' => 'error',
                'confirmButtonText' => 'Retry'
            ]);

            return back()
                ->withErrors($validator)
                ->withInput();
        }

        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->city = $request->city;
        $user->country = $request->country;


        if (!empty($request->password_new)) {
            $request->validate([
                'password_new' => 'required|string|min:8',
            ]);

            $user->password = Hash::make($request->password_new);
        }

        if ($request->hasFile('image')) {
            // Hapus file lama kalau ada, kecuali dari folder dummy
            if ($user->image && Storage::disk('public')->exists( $user->image)) {
                if (!str_starts_with($user->image, 'storage/uploads/profile/imageDummy')) {
                    Storage::disk('public')->delete($user->image);
                }
            }

            // Upload file baru dengan nama UUID
            $file = $request->file('image');
            $filename = Str::uuid() . '.' . $file->getClientOriginalExtension();
            $file->storeAs('uploads/profile', $filename, 'public');

            $user->image = 'uploads/profile/' . $filename;
        }



        Swal::fire([
            'title' => 'Update Successful',
            'text' => 'Your profile has been updated successfully!',
            'icon' => 'success',
            'confirmButtonText' => 'Okay'
        ]);

        $user->save();

        return back();
    }

    public function show(Request $request)
    {
        return view('auth.profile'); // Adjust the view as necessary
    }
}
