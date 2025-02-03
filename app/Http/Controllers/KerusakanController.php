<?php

namespace App\Http\Controllers;

use App\Models\Kerusakan;
use Illuminate\Http\Request;

class KerusakanController extends Controller
{
    public function index()
    {
        $kerusakans = Kerusakan::all(); // Mengambil semua data kerusakan
        return view('admin.kerusakan.index', compact('kerusakans')); // Mengirimkan data ke view
    }


    public function create()
    {

        return view('admin.kerusakan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_infrastruktur' => 'required|string|max:255',
            'jenis_infrastruktur' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'nullable|string|max:50',
            'tanggal_kerusakan' => 'required|date',
            'upload_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Validasi untuk foto
        ]);

        $kerusakan = new Kerusakan();
        $kerusakan->nama_infrastruktur = $request->nama_infrastruktur;
        $kerusakan->jenis_infrastruktur = $request->jenis_infrastruktur;
        $kerusakan->alamat = $request->alamat;
        $kerusakan->deskripsi = $request->deskripsi;
        $kerusakan->latitude = $request->latitude;
        $kerusakan->longitude = $request->longitude;
        $kerusakan->status = $request->status;
        $kerusakan->tanggal_kerusakan = $request->tanggal_kerusakan;

        // Menyimpan upload foto
        if ($request->hasFile('upload_foto')) {
            $file = $request->file('upload_foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $kerusakan->upload_foto = $filename;
        }

        $kerusakan->save();
        return redirect()->route('kerusakan.index')->with('success', 'Data kerusakan berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $kerusakan = Kerusakan::findOrFail($id);
        return view('admin.kerusakan.edit', compact('kerusakan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_infrastruktur' => 'required|string|max:255',
            'jenis_infrastruktur' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'status' => 'nullable|string|max:50',
            'tanggal_kerusakan' => 'required|date',
            'upload_foto' => 'nullable|file|mimes:jpg,jpeg,png|max:2048', // Validasi untuk foto
        ]);

        $kerusakan = Kerusakan::findOrFail($id);
        $kerusakan->nama_infrastruktur = $request->nama_infrastruktur;
        $kerusakan->jenis_infrastruktur = $request->jenis_infrastruktur;
        $kerusakan->alamat = $request->alamat;
        $kerusakan->deskripsi = $request->deskripsi;
        $kerusakan->latitude = $request->latitude;
        $kerusakan->longitude = $request->longitude;
        $kerusakan->status = $request->status;
        $kerusakan->tanggal_kerusakan = $request->tanggal_kerusakan;

        // Mengupdate foto jika ada perubahan
        if ($request->hasFile('upload_foto')) {
            $file = $request->file('upload_foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $kerusakan->upload_foto = $filename;
        }

        $kerusakan->save();
        return redirect()->route('kerusakan.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function destroy($id)
    {
        // Cari data kerusakan berdasarkan ID
        $kerusakan = Kerusakan::findOrFail($id);

        // Hapus file foto jika ada
        if ($kerusakan->upload_foto) {
            $fotoPath = public_path('uploads/' . $kerusakan->upload_foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        // Hapus data dari database
        $kerusakan->delete();

        // Redirect ke halaman daftar kerusakan dengan notifikasi sukses
        return redirect()->route('kerusakan.index')->with('success', 'Data kerusakan berhasil dihapus.');
    }
}
