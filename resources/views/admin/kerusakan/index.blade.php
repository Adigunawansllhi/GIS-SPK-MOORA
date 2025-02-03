@extends('main')

@section('content')

<!-- Peta di atas tabel -->
<div class="card m-3 shadow-sm">
    <div class="card-header bg-info text-white">
        <h3 class="card-title mb-0">Peta Lokasi Kerusakan Infrastruktur</h3>
    </div>
    <div class="card-body p-0">
        <div id="map" class="rounded shadow" style="height: 400px;"></div>
    </div>
</div>

<div class="card m-3 shadow-sm">
    <!-- Card Header -->
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h3 class="card-title mb-0">Data Kerusakan</h3>
        <div class="d-flex gap-2">
            <a href="{{ route('kerusakan.create') }}" class="btn btn-light btn-sm" title="Tambah Data">
                <i class="fa fa-plus"></i> Tambah Data
            </a>
            <a href="#" class="btn btn-light btn-sm" title="Ekspor PDF">
                <i class="fa fa-file-pdf"></i> Ekspor PDF
            </a>
            <a href="#" class="btn btn-light btn-sm" title="Cetak">
                <i class="fa fa-print"></i> Cetak
            </a>
        </div>
    </div>


    <!-- Card Body -->
    <div class="card-body p-0">
        <div class="table-responsive">
            <!-- Tabel Data -->
            <table class="table table-hover table-striped">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Infrastruktur</th>
                        <th>Jenis</th>
                        <th>Alamat</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($kerusakans as $kerusakan)
                    <tr>
                        <!-- Menambahkan nomor urut -->
                        <td>{{ $loop->iteration }}</td>

                        <td>{{ $kerusakan->nama_infrastruktur }}</td>
                        <td>{{ $kerusakan->jenis_infrastruktur }}</td>
                        <td>{{ $kerusakan->alamat }}</td>
                        <td>
                            <span class="badge
                                @if($kerusakan->status == 'Belum Diperbaiki') bg-secondary
                                @elseif($kerusakan->status == 'Dalam Proses') bg-warning
                                @else bg-success
                                @endif">
                                {{ $kerusakan->status }}
                            </span>
                        </td>
                        <td>
                            <!-- Tombol Info -->
                            <button class="btn btn-info btn-sm" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $kerusakan->id }}">
                                <i class="fas fa-info-circle"></i> Info
                            </button>

                            <!-- Tombol Edit -->
                            <a href="{{ route('kerusakan.edit', $kerusakan->id) }}" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i> Edit
                            </a>

                            <!-- Tombol Delete dengan SweetAlert -->
                            <button class="btn btn-danger btn-sm btn-delete" data-id="{{ $kerusakan->id }}">
                                <i class="fas fa-trash-alt"></i> Hapus
                            </button>

                            <!-- Form Delete -->
                            <form id="delete-form-{{ $kerusakan->id }}" action="{{ route('kerusakan.delete', $kerusakan->id) }}" method="POST" class="d-none">
                                @csrf
                                @method('DELETE')
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

<!-- Modal Detail -->
@foreach($kerusakans as $kerusakan)
<div class="modal fade" id="modalDetail{{ $kerusakan->id }}" tabindex="-1" aria-labelledby="modalLabel{{ $kerusakan->id }}" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="modalLabel{{ $kerusakan->id }}">Detail Kerusakan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <table class="table table-bordered">
                    <tr>
                        <th>Nama Infrastruktur</th>
                        <td>{{ $kerusakan->nama_infrastruktur }}</td>
                    </tr>
                    <tr>
                        <th>Jenis Infrastruktur</th>
                        <td>{{ $kerusakan->jenis_infrastruktur }}</td>
                    </tr>
                    <tr>
                        <th>Alamat</th>
                        <td>{{ $kerusakan->alamat }}</td>
                    </tr>
                    <tr>
                        <th>Deskripsi</th>
                        <td>{{ $kerusakan->deskripsi }}</td>
                    </tr>
                    <tr>
                        <th>Status</th>
                        <td>{{ $kerusakan->status }}</td>
                    </tr>
                    <tr>
                        <th>Tanggal Kerusakan</th>
                        <td>{{ $kerusakan->tanggal_kerusakan }}</td>
                    </tr>
                    <tr>
                        <th>Latitude</th>
                        <td>{{ $kerusakan->latitude }}</td>
                    </tr>
                    <tr>
                        <th>Longitude</th>
                        <td>{{ $kerusakan->longitude }}</td>
                    </tr>
                    <tr>
                        <th>Foto</th>
                        <td>
                            @if($kerusakan->upload_foto)
                                <img src="{{ asset('uploads/' . $kerusakan->upload_foto) }}" class="img-thumbnail" style="max-width: 100%;">
                            @else
                                <span class="text-muted">Tidak ada foto</span>
                            @endif
                        </td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
            </div>
        </div>
    </div>
</div>
@endforeach

<!-- LeafletJS -->
<link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    document.addEventListener("DOMContentLoaded", function () {
        document.querySelectorAll('.btn-delete').forEach(button => {
            button.addEventListener('click', function () {
                let id = this.getAttribute('data-id');
                Swal.fire({
                    title: 'Apakah Anda yakin?',
                    text: "Data yang dihapus tidak bisa dikembalikan!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Ya, Hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        document.getElementById(`delete-form-${id}`).submit();
                    }
                });
            });
        });
    });
</script>



<script>
    document.addEventListener("DOMContentLoaded", function () {
        // Default lokasi jika tidak ada data
        const defaultLat = 1.7429;
        const defaultLng = 98.7797;

        // Inisialisasi peta
        const map = L.map('map').setView([defaultLat, defaultLng], 12);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        // Tambahkan marker untuk setiap lokasi kerusakan
        @foreach($kerusakans as $kerusakan)
            L.marker([{{ $kerusakan->latitude }}, {{ $kerusakan->longitude }}])
                .addTo(map)
                .bindPopup(`
                    <strong>{{ $kerusakan->nama_infrastruktur }}</strong><br>
                    {{ $kerusakan->alamat }}<br>
                    Status: <strong>{{ $kerusakan->status }}</strong>
                `);
        @endforeach
    });
</script>

@endsection
