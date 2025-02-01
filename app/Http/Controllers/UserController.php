<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    public function create()
    {
        return view('admin.users.create');
    }

    public function store(Request $request)
    {
        
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'role' => 'required|string|in:admin,pimpinan,masyarakat', // Validasi role
        ]);

        try {
            User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'role' => $request->role, // Simpan role dari inputan
            ]);

            return redirect()->route('users.index')->with('success', 'User  berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan user: ' . $e->getMessage());
        }
    }
    public function destroy($id)
    {
        // Temukan pengguna berdasarkan ID
        $user = User::find($id);

        // Periksa apakah pengguna ada
        if (!$user) {
            return redirect()->back()->with('error', 'User  tidak ditemukan.');
        }

        // Hapus pengguna
        $user->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('users.index')->with('success', 'User  berhasil dihapus.');
    }
}
