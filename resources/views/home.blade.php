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
        <div class="container">
            <h2 class="section-title">Pengaduan Masyarakat</h2>
            <div class="form-container">
                <form id="pengaduanForm">
                    <!-- Nama Pelapor -->
                    <div class="mb-3">
                        <label for="namaPelapor" class="form-label">Nama Pelapor</label>
                        <input type="text" class="form-control" id="namaPelapor" placeholder="Masukkan nama Anda" required>
                    </div>

                    <!-- Nomor HP/WA -->
                    <div class="mb-3">
                        <label for="nomorHP" class="form-label">Nomor HP/WA</label>
                        <input type="text" class="form-control" id="nomorHP" placeholder="Masukkan nomor HP/WA" required>
                    </div>

                    <!-- Alamat Kerusakan -->
                    <div class="mb-3">
                        <label for="alamatKerusakan" class="form-label">Alamat Kerusakan</label>
                        <input type="text" class="form-control" id="alamatKerusakan" placeholder="Masukkan alamat kerusakan" required>
                    </div>

                    <!-- Lokasi Kerusakan (Leaflet Maps) -->
                    <div class="mb-3">
                        <label for="lokasiKerusakan" class="form-label">Lokasi Kerusakan</label>
                        <div id="map"></div>
                        <input type="hidden" id="lokasiKerusakan" name="lokasiKerusakan" required>
                        <button type="button" id="lokasiSaya" class="btn btn-primary mt-2">
                            <i class="bi bi-geo-alt"></i> Gunakan Lokasi Saya
                        </button>
                    </div>

                    <!-- Jenis Infrastruktur yang Rusak -->
                    <div class="mb-3">
                        <label for="jenisInfrastruktur" class="form-label">Jenis Infrastruktur yang Rusak</label>
                        <select class="form-control" id="jenisInfrastruktur" required>
                            <option value="">Pilih Jenis Infrastruktur</option>
                            <option value="Jalan Berlubang">Jalan Berlubang</option>
                            <option value="Jembatan Rusak">Jembatan Rusak</option>
                            <option value="Drainase Tersumbat">Drainase Tersumbat</option>
                            <option value="Lampu Jalan Mati">Lampu Jalan Mati</option>
                            <option value="Bangunan Publik Rusak">Bangunan Publik Rusak</option>
                            <option value="Lainnya">Lainnya</option>
                        </select>
                        <input type="text" class="form-control mt-2" id="jenisLainnya" placeholder="Jelaskan jenis lainnya" style="display: none;">
                    </div>

                    <!-- Deskripsi Kerusakan -->
                    <div class="mb-3">
                        <label for="deskripsiKerusakan" class="form-label">Deskripsi Kerusakan</label>
                        <textarea class="form-control" id="deskripsiKerusakan" rows="4" placeholder="Jelaskan kerusakan yang terjadi" required></textarea>
                    </div>

                    <!-- Dampak yang Ditimbulkan -->
                    <div class="mb-3">
                        <label class="form-label">Dampak yang Ditimbulkan</label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dampak1" value="Menghambat aktivitas warga">
                            <label class="form-check-label" for="dampak1">Menghambat aktivitas warga</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dampak2" value="Membahayakan pengguna jalan">
                            <label class="form-check-label" for="dampak2">Membahayakan pengguna jalan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dampak3" value="Menyebabkan banjir/genangan">
                            <label class="form-check-label" for="dampak3">Menyebabkan banjir/genangan</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dampak4" value="Mengganggu transportasi umum">
                            <label class="form-check-label" for="dampak4">Mengganggu transportasi umum</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="dampak5" value="Lainnya">
                            <label class="form-check-label" for="dampak5">Lainnya</label>
                            <input type="text" class="form-control mt-2" id="dampakLainnya" placeholder="Jelaskan dampak lainnya" style="display: none;">
                        </div>
                    </div>

                    <!-- Upload Bukti (Foto/Video) -->
                    <div class="mb-3">
                        <label for="uploadBukti" class="form-label">Upload Bukti (Foto/Video)</label>
                        <input type="file" class="form-control" id="uploadBukti" accept="image/*, video/*" required>
                    </div>

                    <!-- Tanggal Pengaduan -->
                    <div class="mb-3">
                        <label for="tanggalPengaduan" class="form-label">Tanggal Pengaduan</label>
                        <input type="date" class="form-control" id="tanggalPengaduan" required>
                    </div>

                    <!-- Status Pengaduan -->
                    <div class="mb-3">
                        <label for="statusPengaduan" class="form-label">Status Pengaduan</label>
                        <input type="text" class="form-control" id="statusPengaduan" value="Menunggu Verifikasi" readonly>
                    </div>

                    <!-- Submit Button -->
                    <button type="submit" class="btn btn-submit">Kirim Pengaduan</button>
                </form>
            </div>
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
    <script>
        // Koordinat default: Sibolga
        const defaultLat = -1.7429;
        const defaultLng = 98.7797;

        // Initialize Leaflet Map
        const map = L.map('map').setView([defaultLat, defaultLng], 13); // Zoom level 13
        L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
            attribution: '© OpenStreetMap contributors'
        }).addTo(map);

        let marker = L.marker([defaultLat, defaultLng], { draggable: true }).addTo(map); // Marker default di Sibolga

        // Simpan koordinat saat marker dipindahkan
        marker.on('dragend', function(e) {
            const { lat, lng } = e.target.getLatLng();
            document.getElementById('lokasiKerusakan').value = `${lat}, ${lng}`;
        });

        // Simpan koordinat saat peta diklik
        map.on('click', function(e) {
            const { lat, lng } = e.latlng;
            if (marker) {
                marker.setLatLng([lat, lng]); // Pindahkan marker ke lokasi yang diklik
            }
            document.getElementById('lokasiKerusakan').value = `${lat}, ${lng}`;
        });

        // Tombol "Gunakan Lokasi Saya"
        document.getElementById('lokasiSaya').addEventListener('click', function() {
            if (navigator.geolocation) {
                navigator.geolocation.getCurrentPosition(
                    (position) => {
                        const lat = position.coords.latitude;
                        const lng = position.coords.longitude;
                        marker.setLatLng([lat, lng]); // Pindahkan marker ke lokasi pengguna
                        map.setView([lat, lng], 15); // Zoom ke lokasi pengguna
                        document.getElementById('lokasiKerusakan').value = `${lat}, ${lng}`;
                    },
                    (error) => {
                        alert('Tidak dapat mengakses lokasi Anda. Pastikan izin lokasi diaktifkan.');
                        console.error(error);
                    }
                );
            } else {
                alert('Browser Anda tidak mendukung geolokasi.');
            }
        });

        // Toggle input untuk jenis infrastruktur lainnya
        document.getElementById('jenisInfrastruktur').addEventListener('change', function() {
            const lainnyaInput = document.getElementById('jenisLainnya');
            lainnyaInput.style.display = this.value === 'Lainnya' ? 'block' : 'none';
        });

        // Toggle input untuk dampak lainnya
        document.getElementById('dampak5').addEventListener('change', function() {
            const lainnyaInput = document.getElementById('dampakLainnya');
            lainnyaInput.style.display = this.checked ? 'block' : 'none';
        });

        // Form submission
        document.getElementById('pengaduanForm').addEventListener('submit', function(e) {
            e.preventDefault();
            alert('Pengaduan berhasil dikirim!');
            // Reset form
            this.reset();
            marker.setLatLng([defaultLat, defaultLng]); // Kembalikan marker ke lokasi default
            document.getElementById('lokasiKerusakan').value = `${defaultLat}, ${defaultLng}`;
        });
    </script>
</body>
</html>
