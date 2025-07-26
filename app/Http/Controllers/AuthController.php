<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('authentication.sign-in');
    }

    // Memproses login
    public function login(Request $request)
    {
        // Validasi data yang dikirimkan dari form
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Mencari pengguna berdasarkan email
        $user = User::where('email', $request->email)->first();

        // Jika pengguna ditemukan, password cocok, dan isAccepted = 1
        if ($user && Hash::check($request->password, $user->password)) {
            if ($user->isAccepted == 1) {  // Cek apakah isAccepted = 1
                // Login pengguna
                Auth::login($user);

                // Redirect ke halaman index
                return redirect()->intended('/index');
            } else {
                // Jika isAccepted tidak 1, beri pesan error
                return back()->withErrors([
                    'email' => 'Your account is not accepted yet. Please contact the administrator.',
                ]);
            }
        }

        // Jika login gagal, kirimkan kembali ke halaman login dengan pesan error
        return back()->withErrors([
            'email' => 'The provided credentials are incorrect.',
        ]);
    }

    // Menampilkan form registrasi
    public function showRegistrationForm()
    {
        return view('authentication.sign-up');
    }

    // Memproses registrasi
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'nama' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:user',
            'password' => 'required|string|min:8|confirmed', // Pastikan password terkonfirmasi
        ]);

        try {
            // Membuat pengguna baru
            $user = User::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            // Menyimpan status keberhasilan ke session flash
            session()->flash('status', 'Registration successful! Please log in.');

            // Redirect ke halaman login
            return redirect('/');
        } catch (\Exception $e) {
            // Jika terjadi error saat menyimpan pengguna
            return back()->withErrors(['error' => 'Registration failed. Please try again.']);
        }
    }

    // Logout pengguna
    public function logout()
    {
        Auth::logout();

        // Redirect ke halaman utama
        return redirect('/');
    }
}
