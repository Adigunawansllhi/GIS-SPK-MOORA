@extends('main')

@section('content')

<!-- Peta di atas tabel -->
<div class="card m-3 shadow-sm">
    <div class="card-header  text-white" style="background-color: #2c3e50">
        <h3 class="card-title mb-0">Peta Lokasi Kerusakan Infrastruktur</h3>
    </div>
    <div class="card-body p-0">
        <div id="map" class="rounded shadow" style="height: 400px;"></div>
    </div>
</div>

<div class="card m-3 shadow-sm">
    <!-- Card Header -->
    <div class="card-header text-white d-flex justify-content-between align-items-center" style="background-color: #2c3e50">
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
                        <td>{{ $kerusakan->jenisInfrastruktur ? $kerusakan->jenisInfrastruktur->jenis_infrastruktur : 'Tidak Diketahui' }}</td>
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
                        <td class="text-end"> <!-- Menambahkan text-end di sini -->
                            <div class="d-flex justify-content-start">
                                <!-- Tombol Info -->
                                <button class="btn btn-outline-info btn-sm me-2" data-bs-toggle="modal" data-bs-target="#modalDetail{{ $kerusakan->id }}" title="Info">
                                    <i class="fas fa-info-circle"></i>
                                </button>

                                <!-- Tombol Edit -->
                                <a href="{{ route('kerusakan.edit', $kerusakan->id) }}" class="btn btn-outline-warning btn-sm me-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <!-- Tombol Hapus dengan SweetAlert -->
                                <button class="btn btn-outline-danger btn-sm btn-delete" data-id="{{ $kerusakan->id }}" title="Hapus">
                                    <i class="fas fa-trash-alt"></i>
                                </button>

                                <!-- Form Delete -->
                                <form id="delete-form-{{ $kerusakan->id }}" action="{{ route('kerusakan.delete', $kerusakan->id) }}" method="POST" class="d-none">
                                    @csrf
                                    @method('DELETE')
                                </form>
                            </div>
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
            <div class="modal-header text-white" style="background-color: #2c3e50;">
                <h5 class="modal-title" id="modalLabel{{ $kerusakan->id }}">
                    <i class="fas fa-info-circle me-2"></i> Detail Kerusakan
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-building me-2"></i> Informasi Infrastruktur</h5>
                        <table class="table table-striped">
                            <tr>
                                <th class="text-nowrap" style="width: 25%;"><i class="fas fa-tag me-2"></i> Nama Infrastruktur</th>
                                <td>{{ $kerusakan->nama_infrastruktur }}</td>

                            </tr>
                            <tr>
                                <th class="text-nowrap"><i class="fas fa-list me-2"></i> Jenis Infrastruktur</th>
                                <td>{{ $kerusakan->jenisInfrastruktur ? $kerusakan->jenisInfrastruktur->jenis_infrastruktur : 'Tidak Diketahui' }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap"><i class="fas fa-map-marker-alt me-2"></i> Alamat</th>
                                <td colspan="3">{{ $kerusakan->alamat }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-exclamation-triangle me-2"></i> Detail Kerusakan</h5>
                        <table class="table table-striped">
                            <tr>
                                <th class="text-nowrap"><i class="fas fa-align-left me-2"></i> Deskripsi</th>
                                <td>{{ $kerusakan->deskripsi }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap" style="width: 25%;"><i class="fas fa-calendar-alt me-2"></i> Tanggal Kerusakan</th>
                                <td>{{ $kerusakan->tanggal_kerusakan }}</td>
                            </tr>
                            <tr>
                                <th class="text-nowrap"><i class="fas fa-tasks me-2"></i> Status</th>
                                <td>{{ $kerusakan->status }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card mb-3">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-map-pin me-2"></i> Lokasi</h5>
                        <table class="table table-striped">
                            <tr>
                                <th class="text-nowrap"><i class="fas fa-map-marker-alt me-2"></i> Latitude</th>
                                <td>{{ $kerusakan->latitude }}</td>
                                <th class="text-nowrap"><i class="fas fa-map-marker-alt me-2"></i> Longitude</th>
                                <td>{{ $kerusakan->longitude }}</td>
                            </tr>
                        </table>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title"><i class="fas fa-camera me-2"></i> Foto</h5>
                        @if($kerusakan->upload_foto)
                            <img src="{{ asset('uploads/' . $kerusakan->upload_foto) }}" class="img-fluid rounded" alt="Foto Kerusakan">
                        @else
                            <span class="text-muted"><i class="fas fa-image me-2"></i> Tidak ada foto</span>
                        @endif
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-2"></i> Tutup
                </button>
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
