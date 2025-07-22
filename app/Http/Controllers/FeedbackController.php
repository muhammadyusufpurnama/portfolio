<?php

namespace App\Http\Controllers;

use App\Models\Feedback; // Import model Feedback
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator; // Import Validator

class FeedbackController extends Controller
{
    /**
     * Mengambil dan mengembalikan semua feedback yang ada.
     * Ini akan dipanggil oleh AJAX untuk menampilkan feedback.
     */
    public function index()
    {
        // Mengambil semua feedback, diurutkan dari yang terbaru
        $feedbacks = Feedback::latest()->get();
        return response()->json($feedbacks);
    }

    /**
     * Menyimpan feedback baru ke database.
     * Ini akan dipanggil oleh AJAX saat form disubmit.
     */
    public function store(Request $request)
    {
        // Validasi input (anti-injeksi dan keamanan dasar)
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255', // Nama wajib, string, max 255 karakter
            'email' => 'nullable|email|max:255', // Email opsional, harus format email, max 255 karakter
            'message' => 'required|string|max:1000', // Pesan wajib, string, max 1000 karakter
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422); // Kode status 422 Unprocessable Entity
        }

        // Buat feedback baru
        $feedback = Feedback::create([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback submitted successfully!',
            'feedback' => $feedback // Kirim kembali data feedback yang baru dibuat
        ], 201); // Kode status 201 Created
    }

    /**
     * Mengambil satu feedback berdasarkan ID untuk keperluan edit.
     * (Mungkin tidak langsung digunakan dengan inline edit, tapi bagus untuk API)
     */
    public function show(Feedback $feedback)
    {
        return response()->json($feedback);
    }

    /**
     * Memperbarui feedback yang sudah ada di database.
     * Ini akan dipanggil oleh AJAX saat feedback diedit.
     */
    public function update(Request $request, Feedback $feedback)
    {
        // Validasi input
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'nullable|email|max:255',
            'message' => 'required|string|max:1000',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors()
            ], 422);
        }

        // Perbarui feedback
        $feedback->update([
            'name' => $request->name,
            'email' => $request->email,
            'message' => $request->message,
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Feedback updated successfully!',
            'feedback' => $feedback // Kirim kembali data feedback yang diperbarui
        ]);
    }

    /**
     * Menghapus feedback dari database.
     * Ini akan dipanggil oleh AJAX saat tombol hapus diklik.
     */
    public function destroy(Feedback $feedback)
    {
        $feedback->delete();

        return response()->json([
            'success' => true,
            'message' => 'Feedback deleted successfully!'
        ], 200); // Kode status 200 OK
    }
}
