<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB; // Untuk interaksi database jika RSVP langsung ke DB

class Project2Controller extends Controller
{
    /**
     * Display the wedding invitation.
     */
    public function index()
    {
        return view('portfolio.project2');
    }

    /**
     * Store RSVP data.
     */
    public function storeRsvp(Request $request)
    {
        // Validasi data
        $validatedData = $request->validate([
            'nama' => 'required|string|max:255',
            'jumlah' => 'required|integer|min:1|max:5',
            'status' => 'required|in:Hadir,Tidak Hadir',
        ]);

        // Simpan ke database (contoh: tabel 'rsvps')
        // Pastikan Anda sudah membuat migrasi untuk tabel 'rsvps'
        // php artisan make:migration create_rsvps_table
        // Kemudian edit migrasi:
        // Schema::create('rsvps', function (Blueprint $table) {
        //     $table->id();
        //     $table->string('nama');
        //     $table->integer('jumlah');
        //     $table->string('status');
        //     $table->timestamps();
        // });
        // php artisan migrate

        DB::table('rsvps')->insert([
            'nama' => $validatedData['nama'],
            'jumlah' => $validatedData['jumlah'],
            'status' => $validatedData['status'],
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        // Atau menggunakan Model jika Anda sudah membuat Model RSVP
        // use App\Models\Rsvp;
        // Rsvp::create($validatedData);

        return redirect('/project2')->with('success', 'Konfirmasi kehadiran berhasil terkirim!');
    }
}
