@extends('main')

@section('content')
    <div class="container mt-4">
        <div class="card shadow-lg">
            <div class="card-header  text-white d-flex justify-content-between align-items-center" style="background-color: #2c3e50">
                <h3 class="card-title mb-0">Edit Laporan Kerusakan Infrastruktur</h3>
            </div>
            <div class="card-body">
                <form id="kerusakanForm" action="{{ route('kerusakan.update', $kerusakan->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <div class="mb-3">
                        <label for="namaInfrastruktur" class="form-label">Nama Infrastruktur</label>
                        <input type="text" class="form-control" name="nama_infrastruktur" value="{{ $kerusakan->nama_infrastruktur }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="jenisInfrastruktur" class="form-label">Jenis Infrastruktur</label>
                        <select class="form-select" name="jenis_infrastruktur" id="jenisInfrastruktur" required>
                            <option value="" disabled>Pilih jenis infrastruktur</option>
                            @foreach($jenisInfrastruktur as $jenis)
                                <option value="{{ $jenis->id }}" {{ $kerusakan->jenis_infrastruktur == $jenis->id ? 'selected' : '' }}>
                                    {{ $jenis->jenis_infrastruktur }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="alamat" class="form-label">Alamat</label>
                        <input type="text" class="form-control" name="alamat" value="{{ $kerusakan->alamat }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="deskripsi" class="form-label">Deskripsi Kerusakan</label>
                        <textarea class="form-control" name="deskripsi" rows="4" required>{{ $kerusakan->deskripsi }}</textarea>
                    </div>

                    <div class="mb-3">
                        <label for="lokasiKerusakan" class="form-label">Lokasi Kerusakan (Klik di Peta)</label>
                        <div id="map" class="rounded shadow" style="height: 300px;"></div>
                        <input type="hidden" name="latitude" id="latitude" value="{{ $kerusakan->latitude }}" required>
                        <input type="hidden" name="longitude" id="longitude" value="{{ $kerusakan->longitude }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="status" class="form-label">Status Kerusakan</label>
                        <select class="form-control" name="status" required>
                            <option value="Belum Diperbaiki" {{ $kerusakan->status == 'Belum Diperbaiki' ? 'selected' : '' }}>Belum Diperbaiki</option>
                            <option value="Sedang Diperbaiki" {{ $kerusakan->status == 'Sedang Diperbaiki' ? 'selected' : '' }}>Sedang Diperbaiki</option>
                            <option value="Sudah Diperbaiki" {{ $kerusakan->status == 'Sudah Diperbaiki' ? 'selected' : '' }}>Sudah Diperbaiki</option>
                        </select>
                    </div>

                    <div class="mb-3">
                        <label for="tanggalKerusakan" class="form-label">Tanggal Kerusakan</label>
                        <input type="date" class="form-control" name="tanggal_kerusakan" value="{{ $kerusakan->tanggal_kerusakan }}" required>
                    </div>

                    <div class="mb-3">
                        <label for="upload_foto" class="form-label">Upload Foto</label>
                        <input type="file" class="form-control" name="upload_foto" accept="image/*">
                        @if($kerusakan->upload_foto)
                            <p class="mt-2">Foto Sebelumnya:</p>
                            <img src="{{ asset('uploads/' . $kerusakan->upload_foto) }}" class="img-thumbnail" width="150">
                        @endif
                    </div>

                    <div class="text-end">
                        <a href="{{ route('kerusakan.index') }}" class="btn btn-outline-secondary">Kembali</a>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function () {
            const defaultLat = {{ $kerusakan->latitude ?? 1.7429 }};
            const defaultLng = {{ $kerusakan->longitude ?? 98.7797 }};

            const map = L.map('map').setView([defaultLat, defaultLng], 13);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '© OpenStreetMap contributors'
            }).addTo(map);

            let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

            marker.on('dragend', function(e) {
                const { lat, lng } = e.target.getLatLng();
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });

            map.on('click', function(e) {
                const { lat, lng } = e.latlng;
                marker.setLatLng([lat, lng]);
                document.getElementById('latitude').value = lat;
                document.getElementById('longitude').value = lng;
            });
        });
    </script>

@endsection
