<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas PUPR Kota Sibolga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.4/dist/leaflet.css" />
    <link rel="stylesheet" href="{{ asset('asset/css/style.css') }}">
    <style>
        /* Custom CSS */
        .hero {
            height: 100vh;
            background: url('{{ asset('asset/img/hero-bg.jpg') }}') no-repeat center center/cover;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.7);
            animation: fadeIn 2s ease-in-out;
        }
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: transform 0.3s ease;
        }
        .card:hover {
            transform: translateY(-10px);
        }
        .navbar {
            transition: background-color 0.3s ease;
        }
        .navbar.scrolled {
            background-color: #010378 !important;
        }
        .section-title {
            font-size: 2.5rem;
            font-weight: bold;
            margin-bottom: 2rem;
            text-align: center;
            color: #010378;
        }
        .bg-blue {
            background-color: #010378;
        }
        .text-blue {
            color: #010378;
        }
        .btn-primary {
            background-color: #010378;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }
        .btn-primary:hover {
            background-color: #f7c700;
            color: #010378;
        }
        .btn-secondary {
            background-color: #f7c700;
            color: #010378;
            border: none;
            padding: 10px 20px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }
        .btn-secondary:hover {
            background-color: #010378;
            color: white;
        }
        .footer {
            background-color: #010378;
            color: white;
        }
        #map {
            height: 300px;
            width: 100%;
            margin-bottom: 20px;
            border-radius: 10px;
            border: 2px solid #010378;
        }
        .form-container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border-radius: 10px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-label {
            font-weight: bold;
            color: #010378;
        }
        .form-control {
            margin-bottom: 15px;
            border: 1px solid #010378;
            border-radius: 5px;
            padding: 10px;
        }
        .form-control:focus {
            border-color: #f7c700;
            box-shadow: 0 0 5px rgba(247, 199, 0, 0.5);
        }
        .btn-submit {
            background-color: #010378;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            font-size: 1.1rem;
            transition: background-color 0.3s ease;
        }
        .btn-submit:hover {
            background-color: #f7c700;
            color: #010378;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" style="background-color: #f7c700;">
        <div class="container">
            <a class="navbar-brand fw-bold" href="#">
                <img src="{{ asset('asset/img/logo-pu.png') }}" alt="Logo" width="30" height="30" class="d-inline-block align-text-top">
                Dinas PUPR Kota Sibolga
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto fw-bold">
                    <li class="nav-item"><a class="nav-link active" href="#">Beranda</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="profilDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
                        <ul class="dropdown-menu" aria-labelledby="profilDropdown">
                            <li><a class="dropdown-item" href="#sejarah">Sejarah</a></li>
                            <li><a class="dropdown-item" href="#visi-misi">Visi & Misi</a></li>
                            <li><a class="dropdown-item" href="#struktur">Struktur Organisasi</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#program-kerja">Program Kerja</a></li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="layananDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">Layanan</a>
                        <ul class="dropdown-menu" aria-labelledby="layananDropdown">
                            <li><a class="dropdown-item" href="#informasi-proyek">Informasi Proyek</a></li>
                            <li><a class="dropdown-item" href="#perizinan">Perizinan</a></li>
                            <li><a class="dropdown-item" href="#pengaduan">Pengaduan Masyarakat</a></li>
                        </ul>
                    </li>
                    <li class="nav-item"><a class="nav-link" href="#galeri">Galeri</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak Kami</a></li>
                    <li>
                        <a href="{{ route('login') }}" class="btn login btn-secondary"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <header class="hero">
        <div class="container text-center">
            <h1 class="display-5 fw-bold">Selamat Datang di Website Dinas PUPR Kota Sibolga</h1>
            <p class="lead">Mewujudkan Infrastruktur yang Berkelanjutan untuk Kemajuan Kota Sibolga</p>
            <a href="#program-kerja" class="btn btn-primary btn-lg">Pelajari Lebih Lanjut</a>
        </div>
    </header>

    <!-- Profil Section -->
    <section id="sejarah" class="py-5">
        <div class="container">
            <h2 class="section-title">Sejarah</h2>
            <p class="text-center">Dinas Pekerjaan Umum dan Penataan Ruang (PUPR) Kota Sibolga didirikan pada tahun 1965 dengan tujuan untuk mengawasi dan mengelola pembangunan infrastruktur di Kota Sibolga. Sejak berdirinya, Dinas PUPR telah berperan penting dalam pembangunan jalan, jembatan, dan fasilitas umum lainnya yang mendukung pertumbuhan ekonomi dan kesejahteraan masyarakat.</p>
        </div>
    </section>
    <section id="visi-misi" class="py-5 bg-blue text-white">
        <div class="container">
            <h2 class="section-title">Visi & Misi</h2>
            <div class="row align-items-center">
                <div class="col-md-6">
                    <h3>Visi</h3>
                    <p>"Mewujudkan Kota Sibolga dengan Infrastruktur yang Kokoh, Berkelanjutan, dan Berwawasan Lingkungan untuk Meningkatkan Kesejahteraan Masyarakat."</p>
                    <h3>Misi</h3>
                    <ul>
                        <li>Meningkatkan pembangunan infrastruktur jalan dan jembatan untuk mendukung konektivitas wilayah.</li>
                        <li>Mengembangkan fasilitas air bersih dan sanitasi yang memadai bagi masyarakat.</li>
                        <li>Mendukung pembangunan perumahan yang layak dan terjangkau.</li>
                        <li>Meningkatkan pemeliharaan dan pengelolaan lingkungan perkotaan yang ramah lingkungan.</li>
                    </ul>
                </div>
                <div class="col-md-6 text-center">
                    <img src="{{ asset('asset/img/logo-sibolga.png') }}" alt="Visi dan Misi" class="img-fluid rounded">
                </div>
            </div>
        </div>
    </section>
    <section id="struktur" class="py-5">
        <div class="container">
            <h2 class="section-title">Struktur Organisasi</h2>
            <p class="text-center">Dinas PUPR Kota Sibolga terdiri dari beberapa divisi yang bekerja sama untuk mencapai tujuan pembangunan infrastruktur. Struktur organisasi kami meliputi Divisi Perencanaan, Divisi Pelaksanaan, Divisi Pengawasan, dan Divisi Pemeliharaan. Setiap divisi dipimpin oleh seorang kepala divisi yang bertanggung jawab langsung kepada Kepala Dinas.</p>
        </div>
    </section>

    <!-- Program Kerja Section -->
    <section id="program-kerja" class="py-5">
        <div class="container">
            <h2 class="section-title">Program Kerja</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card p-3">
                        <i class="bi bi-building fs-1 text-blue"></i>
                        <h5 class="mt-3">Pembangunan Jalan</h5>
                        <p>Meningkatkan aksesibilitas dengan pembangunan dan perbaikan jalan.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card p-3">
                        <i class="bi bi-house-door fs-1 text-blue"></i>
                        <h5 class="mt-3">Perumahan Rakyat</h5>
                        <p>Penyediaan perumahan yang layak bagi masyarakat berpenghasilan rendah.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card p-3">
                        <i class="bi bi-water fs-1 text-blue"></i>
                        <h5 class="mt-3">Pengelolaan Air</h5>
                        <p>Memastikan ketersediaan air bersih bagi seluruh warga kota.</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Layanan Section -->
    <section id="informasi-proyek" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Informasi Proyek</h2>
            <p class="text-center">Berikut adalah daftar proyek-proyek yang sedang berjalan di bawah pengawasan Dinas PUPR Kota Sibolga:</p>
            <ul class="list-group">
                <li class="list-group-item">Pembangunan Jalan Tol Sibolga - Medan</li>
                <li class="list-group-item">Pembangunan Jembatan Sibolga</li>
                <li class="list-group-item">Pembangunan Sistem Pengelolaan Air Bersih</li>
            </ul>
        </div>
    </section>
    <section id="perizinan" class="py-5">
        <div class="container">
            <h2 class="section-title">Perizinan</h2>
            <p class="text-center">Dinas PUPR Kota Sibolga menyediakan layanan perizinan untuk berbagai kegiatan pembangunan. Silakan kunjungi kantor kami atau hubungi kami melalui kontak yang tersedia untuk informasi lebih lanjut.</p>
        </div>
    </section>
    <section id="pengaduan" class="py-5 bg-light">
        <div class="container mt-5">
            <h2 class="mb-4">Form Pengaduan Infrastruktur</h2>
            <form id="pengaduanForm" action="{{ route('pengaduan.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label for="nama" class="form-label">Nama Pelapor</label>
                    <input type="text" class="form-control" name="nama" placeholder="Masukkan nama pelapor" required>
                </div>

                <div class="mb-3">
                    <label for="no_hp" class="form-label">No HP</label>
                    <input type="text" class="form-control" name="no_hp" placeholder="Masukkan nomor HP" required>
                </div>

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
                    <label for="tanggalKerusakan" class="form-label">Tanggal Kerusakan</label>
                    <input type="date" class="form-control" name="tanggal_kerusakan" required>
                </div>

                <div class="mb-3">
                    <label for="upload_foto" class="form-label">Upload Foto</label>
                    <input type="file" class="form-control" name="upload_foto" accept="image/*">
                </div>

                <div class="text-end">
                    <a href="{{ route('pengaduan.index') }}" class="btn btn-outline-secondary">Kembali</a>
                    <button type="submit" class="btn btn-primary">Kirim Laporan</button>
                </div>
            </form>

        </div>


    <!-- Galeri Section -->
    <section id="galeri" class="py-5">
        <div class="container">
            <h2 class="section-title">Galeri</h2>
            <div class="row">
                <div class="col-md-4">
                    <img src="{{ asset('asset/img/1.jpg') }}" class="img-fluid rounded" alt="Galeri 1">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('asset/img/2.jpg') }}" class="img-fluid rounded" alt="Galeri 2">
                </div>
                <div class="col-md-4">
                    <img src="{{ asset('asset/img/3.jpeg') }}" class="img-fluid rounded" alt="Galeri 3">
                </div>
            </div>
        </div>
    </section>

    <!-- Kontak Section -->
    <section id="kontak" class="py-5 bg-light">
        <div class="container">
            <h2 class="section-title">Kontak Kami</h2>
            <form>
                <div class="mb-3">
                    <label for="name" class="form-label">Nama</label>
                    <input type="text" class="form-control" id="name" placeholder="Masukkan nama Anda">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email</label>
                    <input type="email" class="form-control" id="email" placeholder="Masukkan email Anda">
                </div>
                <div class="mb-3">
                    <label for="message" class="form-label">Pesan</label>
                    <textarea class="form-control" id="message" rows="4" placeholder="Masukkan pesan Anda"></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Kirim</button>
            </form>
        </div>
    </section>

    <!-- Footer -->
    <footer class="footer py-4">
        <div class="container text-center">
            <p>&copy; 2025 Dinas PUPR Kota Sibolga. All rights reserved.</p>
            <p>Kontak: (123) 456-7890 | Email: info@puprsibolga.go.id</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script>
       document.addEventListener("DOMContentLoaded", function () {
    // Koordinat default: Sibolga
    const defaultLat = 1.7429;
    const defaultLng = 98.7797;

    // Batas Kota Sibolga
    const bounds = [
        [1.7240, 98.7600], // Batas Selatan, Barat (Lat, Lng)
        [1.7550, 98.8000]  // Batas Utara, Timur (Lat, Lng)
    ];

    // Inisialisasi Leaflet Map
    const map = L.map('map', {
        zoomControl: true,
        minZoom: 12,
        maxZoom: 18
    }).setView([defaultLat, defaultLng], 13);

    // Tambahkan tile layer OpenStreetMap
    L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
        attribution: '© OpenStreetMap contributors'
    }).addTo(map);

    // Tambahkan marker yang bisa dipindahkan
    let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

    // Update koordinat saat marker dipindahkan
    marker.on('dragend', function (e) {
        const { lat, lng } = e.target.getLatLng();
        document.getElementById('latitude').value = lat;
        document.getElementById('longitude').value = lng;
    });

    // Update koordinat saat peta diklik (dengan batas wilayah)
    map.on('click', function (e) {
        const { lat, lng } = e.latlng;

        if (lat >= 1.7240 && lat <= 1.7550 && lng >= 98.7600 && lng <= 98.8000) {
            marker.setLatLng([lat, lng]);
            document.getElementById('latitude').value = lat;
            document.getElementById('longitude').value = lng;
        } else {
            Swal.fire({
                title: 'Lokasi di luar Kota Sibolga!',
                text: 'Silakan pilih lokasi di dalam area Kota Sibolga.',
                icon: 'warning',
                confirmButtonText: 'OK',
                confirmButtonColor: '#3085d6'
            }).then(() => {
                marker.setLatLng([defaultLat, defaultLng]);
                document.getElementById('latitude').value = defaultLat;
                document.getElementById('longitude').value = defaultLng;
            });
        }
    });


    // Tampilkan input "Jenis Infrastruktur Lainnya" jika opsi "Lainnya" dipilih
    document.getElementById('jenis_infrastruktur').addEventListener('change', function () {
        document.getElementById('jenis_lainnya').style.display = this.value === 'Lainnya' ? 'block' : 'none';
    });

});

// Sweet alert
    document.getElementById('pengaduanForm').addEventListener('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman langsung

        Swal.fire({
            title: 'Apakah Anda yakin?',
            text: "Pastikan semua data sudah benar sebelum dikirim.",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Ya, Kirim!',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                // Kirim form secara manual setelah konfirmasi
                this.submit();

                // Menampilkan notifikasi sukses setelah form dikirim
                Swal.fire({
                    title: 'Laporan Terkirim!',
                    text: 'Pengaduan Anda telah berhasil dikirim.',
                    icon: 'success',
                    confirmButtonColor: '#3085d6',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
    </script>

</body>
</html>
