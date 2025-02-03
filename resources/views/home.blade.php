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
            <form id="pengaduanForm" action="#" method="POST" enctype="multipart/form-data">
                @csrf
                        @if ($errors->any())
                 <div div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
                 @endif
                <div class="mb-3">
                    <label class="form-label">Nama Pelapor</label>
                    <input type="text" class="form-control" name="nama_pelapor" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Nomor HP/WA</label>
                    <input type="text" class="form-control" name="nomor_hp" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Alamat Kerusakan</label>
                    <input type="text" class="form-control" name="alamat_kerusakan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Lokasi Kerusakan</label>
                    <div id="map"></div>
                    <input type="hidden" name="lokasi_kerusakan" id="lokasi_kerusakan" required>
                    <button type="button" id="lokasiSaya" class="btn btn-primary mt-2">Gunakan Lokasi Saya</button>
                </div>
                <div class="mb-3">
                    <label class="form-label">Jenis Infrastruktur</label>
                    <select class="form-control" name="jenis_infrastruktur" id="jenis_infrastruktur" required>
                        <option value="Jalan">Jalan</option>
                        <option value="Jembatan">Jembatan</option>
                        <option value="Drainase">Drainase</option>
                        <option value="Lainnya">Lainnya</option>
                    </select>
                    <input type="text" class="form-control mt-2" name="jenis_lainnya" id="jenis_lainnya" placeholder="Jelaskan jenis lainnya" style="display:none;">
                </div>
                <div class="mb-3">
                    <label class="form-label">Deskripsi Kerusakan</label>
                    <textarea class="form-control" name="deskripsi_kerusakan" rows="4" required></textarea>
                </div>
                <div class="mb-3">
                    <label class="form-label">Dampak yang Ditimbulkan</label>
                    <div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dampak[]" value="Macet" id="dampak1">
                            <label class="form-check-label" for="dampak1">Macet</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dampak[]" value="Kecelakaan" id="dampak2">
                            <label class="form-check-label" for="dampak2">Kecelakaan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dampak[]" value="Banjir" id="dampak3">
                            <label class="form-check-label" for="dampak3">Banjir</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dampak[]" value="Kerusakan Kendaraan" id="dampak4">
                            <label class="form-check-label" for="dampak4">Kerusakan Kendaraan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="dampak[]" value="Lainnya" id="dampak5">
                            <label class="form-check-label" for="dampak5">Lainnya</label>
                        </div>
                        <input type="text" class="form-control mt-2" name="dampak_lainnya" id="dampak_lainnya" placeholder="Jelaskan dampak lainnya" style="display:none;">
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Upload Bukti (Foto/Video)</label>
                    <input type="file" class="form-control" name="upload_bukti" accept="image/*, video/*">
                </div>
                <div class="mb-3">
                    <label class="form-label">Tanggal Pengaduan</label>
                    <input type="date" class="form-control" name="tanggal_pengaduan" required>
                </div>
                <div class="mb-3">
                    <label class="form-label">Status Pengaduan</label>
                    <input type="text" class="form-control" name="status_pengaduan" value="Menunggu Verifikasi" readonly>
                </div>
                <button type="submit" class="btn btn-primary">Kirim Pengaduan</button>
            </form>
        </div>

    </section>

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
    <script src="{{ asset('asset/js/script.js') }}"></script>
    <script>
        // Koordinat default: Sibolga
        const defaultLat = 1.7429;
        const defaultLng = 98.7797;

        // Initialize Leaflet Map
        const map = L.map('map').setView([defaultLat, defaultLng], 13);
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map);

        // Simpan koordinat saat marker dipindahkan
        marker.on('dragend', function(e) {
            const { lat, lng } = e.target.getLatLng();
            document.querySelector('input[name="lokasi_kerusakan"]').value = `${lat}, ${lng}`;
        });

        // Simpan koordinat saat peta diklik
        map.on('click', function(e) {
            const { lat, lng } = e.latlng;
            marker.setLatLng([lat, lng]);
            document.querySelector('input[name="lokasi_kerusakan"]').value = `${lat}, ${lng}`;
        });

        // Tombol "Gunakan Lokasi Saya"
        document.getElementById('lokasiSaya').addEventListener('click', function() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(function(position) {
                var latitude = position.coords.latitude;
                var longitude = position.coords.longitude;
                var lokasi = latitude + ',' + longitude;
                document.getElementById('lokasi_kerusakan').value = lokasi;
                alert('Lokasi berhasil diambil: ' + lokasi); // Untuk debugging
            }, function(error) {
                alert('Gagal mengambil lokasi: ' + error.message); // Untuk debugging
            });
        } else {
            alert('Geolocation tidak didukung di browser ini.'); // Untuk debugging
        }
    });

        // Toggle input untuk jenis infrastruktur lainnya
        document.getElementById('jenis_infrastruktur').addEventListener('change', function() {
            const lainnyaInput = document.getElementById('jenis_lainnya');
            lainnyaInput.style.display = this.value === 'Lainnya' ? 'block' : 'none';
        });

        // Form submission
        document.getElementById('pengaduanForm').addEventListener('submit', function(e) {

});

document.getElementById('dampak5').addEventListener('change', function() {
    if (this.checked) {
        document.getElementById('dampak_lainnya').style.display = 'block';
    } else {
        document.getElementById('dampak_lainnya').style.display = 'none';
    }
});
    </script>
</body>
</html>
