@extends('main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #2c3e50">
                <h3 class="card-title mb-0">Laporkan Kerusakan Infrastruktur</h3>
            </div>
            <div class="card-body">
                <form id="kerusakanForm" action="/kerusakan" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="mb-3">
                        <label for="namaInfrastruktur" class="form-label">Nama Infrastruktur</label>
                        <input type="text" class="form-control" name="nama_infrastruktur" placeholder="Masukkan nama infrastruktur" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenisInfrastruktur" class="form-label">Jenis Infrastruktur</label>
                        <select class="form-select" name="jenis_infrastruktur" id="jenisInfrastruktur" required>
                            <option value="" disabled selected>Pilih jenis infrastruktur</option>
                            @foreach($jenisInfrastruktur as $jenis)
                                <option value="{{ $jenis->id }}">{{ $jenis->jenis_infrastruktur }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" placeholder="Masukkan alamat" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Kerusakan</label>
                        <textarea class="form-control" name="deskripsi" rows="4" placeholder="Jelaskan kerusakan yang terjadi" required></textarea>
                    </div>

                    <div class="mb-3">
                        <label for="lokasiKerusakan" class="form-label">Lokasi Kerusakan (Klik di Peta)</label>
                        <div id="map" class="rounded shadow" style="height: 300px;"></div>
                        <input type="hidden" name="latitude" id="latitude" required>
                        <input type="hidden" name="longitude" id="longitude" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status Kerusakan</label>
                        <select class="form-control" name="status" required>
                            <option value="Belum Diperbaiki" selected>Belum Diperbaiki</option>
                            <option value="Sedang Diperbaiki">Sedang Diperbaiki</option>
                            <option value="Sudah Diperbaiki">Sudah Diperbaiki</option>
                        </select>
                    </div>


                    <div class="mb-3">
                        <label for="tanggalKerusakan" class="form-label">Tanggal Kerusakan</label>
                        <input type="date" class="form-control" name="tanggal_kerusakan" required>
                    </div>

                    <div class="mb-3">
                        <label for="upload_foto" class="form-label">Upload Foto</label>
                        <input type="file" class="form-control" name="upload_foto" accept="image/*">
                    </div>

                    <div class="text-end">
                        <a href="{{ route('kerusakan.index') }}" class="btn btn-outline-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
    document.addEventListener("DOMContentLoaded", function () {
    const defaultLat = 1.7429;
    const defaultLng = 98.7797;

    // Batas untuk Kota Sibolga (pastikan batasnya cukup luas dan akurat)
    const bounds = [
        [1.7240, 98.7600], // Batas Selatan, Barat (Lat, Lng)
        [1.7550, 98.8000]  // Batas Utara, Timur (Lat, Lng)
    ];

    const map = L.map('map', {
        zoomControl: true,
        minZoom: 12,  // Level zoom minimum
        maxZoom: 18,  // Level zoom maksimum
    }).setView([defaultLat, defaultLng], 13); // Posisi default di Kota Sibolga

    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Menambahkan marker dengan angka urutan
    let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

    marker.on('dragend', function(e) {
        const { lat, lng } = e.target.getLatLng();
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });

    map.on('click', function(e) {
        const { lat, lng } = e.latlng;

        // Mengecek apakah klik berada dalam batas Kota Sibolga
        if (lat >= 1.7240 && lat <= 1.7550 && lng >= 98.7600 && lng <= 98.8000) {
            marker.setLatLng([lat, lng]);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        } else {
            // Menggunakan SweetAlert2 untuk notifikasi
            Swal.fire({
                title: 'Lokasi di luar Kota Sibolga!',
                text: 'Lokasi yang Anda pilih berada di luar area Kota Sibolga! Silakan pilih lokasi di dalam area Kota Sibolga.',
                icon: 'warning',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6',
                background: '#fff3cd',
                color: '#856404'
            }).then(() => {
                // Reset marker ke lokasi default jika berada di luar batas
                marker.setLatLng([defaultLat, defaultLng]);
                document.getElementById('latitude').value = defaultLat;
                document.getElementById('longitude').value = defaultLng;
            });
        }
    });
});

    </script>


@endsection
