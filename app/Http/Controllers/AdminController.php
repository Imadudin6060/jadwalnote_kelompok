<?php

namespace App\Http\Controllers;

use App\Models\User; // Pastikan ini TIDAK ADA // di depannya
use Illuminate\Http\Request; // Pastikan ini juga ada

class AdminController extends Controller
{
    public function index()
    {
        $users = User::all(); // Ambil semua data user
        return view('admin.users', compact('users')); // Kirimkan $users ke view
    }

    // Metode destroy untuk menghapus pengguna
    public function destroy(User $user) // Gunakan Route Model Binding di sini
    {
        $user->delete(); // Hapus user dari database

        // Redirect kembali ke halaman admin users dengan pesan sukses
        return redirect()->route('admin.users')->with('success', 'Pengguna berhasil dihapus!');
    }
}