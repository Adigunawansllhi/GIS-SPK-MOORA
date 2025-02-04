<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JenisInfrastruktur;
use App\Models\Pengaduan;
use App\Models\Kerusakan; // Pastikan Anda mengimpor model Kerusakan

class PengaduanController extends Controller
{
    public function index()
    {
        $jenisInfrastruktur = JenisInfrastruktur::all();
        $pengaduan = Pengaduan::with('jenisInfrastruktur')->get(); // Mendapatkan data pengaduan
        return view('admin.pengaduan.index', compact('jenisInfrastruktur', 'pengaduan')); // Kirim kedua variabel ke view
    }

    public function create()
    {
        $jenisInfrastruktur = JenisInfrastruktur::all();
        return view('home', compact('jenisInfrastruktur'));
    }

    public function store(Request $request)
    {
        // Validasi inputan
        $request->validate([
            'nama' => 'required|string|max:255',
            'no_hp' => 'required|string|max:15',
            'nama_infrastruktur' => 'required|string|max:255',
            'jenis_infrastruktur' => 'required|exists:table_jenis,id', // Pastikan jenis infrastruktur valid
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string',
            'latitude' => 'nullable|numeric',
            'longitude' => 'nullable|numeric',
            'upload_foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validasi file
        ]);

        // Menyimpan data pengaduan
        $pengaduan = new Pengaduan();
        $pengaduan->nama = $request->nama;
        $pengaduan->no_hp = $request->no_hp;
        $pengaduan->nama_infrastruktur = $request->nama_infrastruktur;
        $pengaduan->jenis_infrastruktur = $request->jenis_infrastruktur;
        $pengaduan->alamat = $request->alamat;
        $pengaduan->deskripsi = $request->deskripsi;
        $pengaduan->latitude = $request->latitude;
        $pengaduan->longitude = $request->longitude;
        $pengaduan->tanggal_kerusakan = $request->tanggal_kerusakan;

        // Menangani upload foto (jika ada)
        if ($request->hasFile('upload_foto')) {
            $file = $request->file('upload_foto');
            $filename = time() . '.' . $file->getClientOriginalExtension();
            $file->move(public_path('uploads'), $filename);
            $pengaduan->upload_foto = $filename;
        }

        // Menyimpan pengaduan ke database
        $pengaduan->save();

        // Redirect atau pesan sukses
        return redirect()->route('home')->with('success', 'Pengaduan berhasil dikirim!');
    }

    public function verifikasi($id)
    {
        // Temukan pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Ubah status pengaduan menjadi 'disetujui'
        $pengaduan->status = 'disetujui';
        $pengaduan->save();

        // Buat entri baru di tabel kerusakan
        Kerusakan::create([
            'pengaduan_id' => $pengaduan->id, // Jika Anda memiliki relasi
            'nama_infrastruktur' => $pengaduan->nama_infrastruktur,
            'jenis_infrastruktur' => $pengaduan->jenis_infrastruktur,
            'alamat' => $pengaduan->alamat,
            'deskripsi' => $pengaduan->deskripsi,
            'latitude' => $pengaduan->latitude,
            'longitude' => $pengaduan->longitude,
            'tanggal_kerusakan' => $pengaduan->tanggal_kerusakan,
            'upload_foto' => $pengaduan->upload_foto,
            // Tambahkan kolom lain yang diperlukan di tabel kerusakan
        ]);

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil diverifikasi.');
    }

    public function ditolak($id)
    {
        // Temukan pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Ubah status pengaduan menjadi 'ditolak'
        $pengaduan->status = 'ditolak';
        $pengaduan->save();

        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil ditolak.');
    }

    public function destroy($id)
    {
        // Cari data pengaduan berdasarkan ID
        $pengaduan = Pengaduan::findOrFail($id);

        // Hapus file foto jika ada dan hanya jika pengaduan dihapus
        if ($pengaduan->upload_foto) {
            $fotoPath = public_path('uploads/' . $pengaduan->upload_foto);
            if (file_exists($fotoPath)) {
                unlink($fotoPath);
            }
        }

        // Hapus data dari database
        $pengaduan->delete();

        // Redirect ke halaman daftar pengaduan dengan notifikasi sukses
        return redirect()->route('pengaduan.index')->with('success', 'Pengaduan berhasil dihapus.');
    }
}
