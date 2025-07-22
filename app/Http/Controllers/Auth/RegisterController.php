<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User; // Import model User
use Illuminate\Support\Facades\Hash; // Untuk hashing password
use Illuminate\Validation\Rules\Password; // Untuk validasi password Laravel 8+

class RegisterController extends Controller
{
    /**
     * Show the application registration form.
     *
     * @return \Illuminate\View\View
     */
    public function showRegistrationForm()
    {
        // Perhatikan path view, disesuaikan dengan folder 'sub' Anda
        return view('sub.signup');
    }

    /**
     * Handle a registration request for the application.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\JsonResponse
     */
    public function register(Request $request)
    {
        // Validasi input
        $request->validate([
            'fullname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => [
                'required',
                'confirmed', // Memastikan password_confirmation cocok
                Password::min(8) // Minimal 8 karakter
                    ->mixedCase() // Harus ada huruf besar & kecil
                    ->letters()   // Harus ada huruf
                    ->numbers()   // Harus ada angka
                    ->symbols(['#', '$', '&']), // Harus ada simbol #, $, atau &
            ],
            'recovery_email' => ['nullable', 'string', 'email', 'max:255'],
            'role' => ['required', 'in:user,admin'], // Memastikan role hanya 'user' atau 'admin'
            'agree_terms' => ['accepted'], // Untuk checkbox persetujuan
        ], [
            'fullname.required' => 'Nama harus diisi terlebih dahulu.',
            'email.required' => 'Email harus diisi.',
            'email.email' => 'Format email tidak valid.',
            'email.unique' => 'Email ini sudah terdaftar.',
            'password.required' => 'Password harus diisi terlebih dahulu.',
            'password.min' => 'Password harus memiliki minimal 8 karakter.',
            'password.mixedCase' => 'Password harus mengandung huruf besar dan kecil.',
            'password.letters' => 'Password harus mengandung setidaknya satu huruf.',
            'password.numbers' => 'Password harus memiliki setidaknya satu angka.',
            'password.symbols' => 'Password harus memiliki setidaknya satu simbol unik (#, $, &).',
            'password.confirmed' => 'Konfirmasi password tidak sama.',
            'role.required' => 'Silakan pilih jenis akun.',
            'role.in' => 'Pilihan role tidak valid.',
            'agree_terms.accepted' => 'Anda harus setuju dengan perjanjian di atas.',
        ]);

        // Membuat user baru
        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password), // Hashing password!
            'recovery_email' => $request->recovery_email,
            'role' => $request->role,
        ]);

        // Opsional: Langsung login user setelah registrasi
        auth()->login($user);

        // Redirect ke halaman sukses atau dashboard
        return redirect('/project1')->with('success', 'Akun Anda berhasil dibuat!');
    }
}
