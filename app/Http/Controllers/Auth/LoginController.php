<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import Facade Auth

class LoginController extends Controller
{
    /**
     * Show the application login form.
     *
     * @return \Illuminate\View\View
     */
    public function showLoginForm()
    {
        // Perhatikan path view, disesuaikan dengan folder 'sub' Anda
        return view('sub.login');
    }

    /**
     * Handle a login request to the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function login(Request $request)
    {
        // 1. Validasi input
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ], [
            'email.required' => 'Alamat email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'password.required' => 'Password harus diisi.',
        ]);

        // Coba autentikasi pengguna
        // Jika Anda memiliki kolom 'name' untuk username, Anda bisa menggunakan itu juga.
        // Di sini kita pakai 'email' dan 'password'
        if (Auth::attempt($credentials, $request->filled('remember'))) { // 'remember' sesuai checkbox
            $request->session()->regenerate();

            // Redirect pengguna setelah login sukses
            // Anda bisa mengarahkan ke dashboard atau halaman lain
            // Contoh: return redirect()->intended('/dashboard');
            // Untuk kasus Anda, kita arahkan ke /project1
            return redirect()->intended('/project1')->with('success', 'Login berhasil!');
        }

        // Jika autentikasi gagal, kembali ke form login dengan error
        return back()->withErrors([
            'email' => 'Kredensial yang diberikan tidak cocok dengan catatan kami.',
        ])->onlyInput('email');
    }

    /**
     * Log the user out of the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/project1')->with('success', 'Anda telah logout.'); // Redirect ke project1 setelah logout
    }
}
