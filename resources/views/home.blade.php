<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dinas PUPR Kota Sibolga</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css" integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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
        }
        .card {
            border: none;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-dark" style="background-color : #f7c700">
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
                        <a href="{{ route('login') }}" class="btn login"><i class="fa-solid fa-right-to-bracket"></i> Login</a>
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
            <h2 class="text-center mb-4">Sejarah</h2>
            <p>Sejarah Dinas PUPR Kota Sibolga dimulai sejak ...</p>
        </div>
    </section>
    <section id="visi-misi" class="py-5" style="background-color: #010378;">
        <div class="container text-white  ">
            <h2 class="text-center mb-4">- Visi & Misi -</h2>
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
            <h2 class="text-center mb-4">Struktur Organisasi</h2>
            <p>Struktur organisasi Dinas PUPR ...</p>
        </div>
    </section>

    <!-- Program Kerja Section -->
    <section id="program-kerja" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Program Kerja</h2>
            <div class="row">
                <div class="col-md-4 text-center">
                    <div class="card p-3">
                        <i class="bi bi-building fs-1 text-primary"></i>
                        <h5 class="mt-3">Pembangunan Jalan</h5>
                        <p>Meningkatkan aksesibilitas dengan pembangunan dan perbaikan jalan.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card p-3">
                        <i class="bi bi-house-door fs-1 text-primary"></i>
                        <h5 class="mt-3">Perumahan Rakyat</h5>
                        <p>Penyediaan perumahan yang layak bagi masyarakat berpenghasilan rendah.</p>
                    </div>
                </div>
                <div class="col-md-4 text-center">
                    <div class="card p-3">
                        <i class="bi bi-water fs-1 text-primary"></i>
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
            <h2 class="text-center mb-4">Informasi Proyek</h2>
            <p>Informasi mengenai proyek-proyek yang sedang berjalan ...</p>
        </div>
    </section>
    <section id="perizinan" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Perizinan</h2>
            <p>Prosedur dan informasi perizinan terkait infrastruktur ...</p>
        </div>
    </section>
    <section id="pengaduan" class="py-5 bg-light">
        <div class="container">
            <h2 class="text-center mb-4">Pengaduan Masyarakat</h2>
            <p>Formulir dan kontak untuk pengaduan masyarakat ...</p>
        </div>
    </section>

    <!-- Galeri Section -->
    <section id="galeri" class="py-5">
        <div class="container">
            <h2 class="text-center mb-4">Galeri</h2>
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
            <h2 class="text-center mb-4">Kontak Kami</h2>
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
    <footer class="bg-dark text-light py-4">
        <div class="container text-center">
            <p>&copy; 2025 Dinas PUPR Kota Sibolga. All rights reserved.</p>
            <p>Kontak: (123) 456-7890 | Email: info@puprsibolga.go.id</p>
        </div>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
