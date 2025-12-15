<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Layanan Surat Desa Online</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/layout.css') }}">
</head>

<body class="d-flex flex-column min-vh-100">

    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm sticky-top">
        <div class="container">
            <a class="navbar-brand d-flex align-items-center gap-2" href="#">
                <span class="fs-3">🏛️</span>
                <div class="lh-sm">
                    <div class="fw-bold">Surat Desa Online</div>
                    <small class="text-muted">Desa Mranggen</small>
                </div>
            </a>

            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto mb-2 mb-lg-0 align-items-lg-center gap-lg-2">
                    <li class="nav-item"><a class="nav-link active" href="{{ '/' }}">Beranda</a></li>
                    <li class="nav-item"><a class="nav-link" href="{{ route('surat.index') }}">Layanan Surat</a></li>
                    <li class="nav-item"><a class="nav-link" href="#status">Cek Status</a></li>
                    <li class="nav-item"><a class="nav-link" href="#panduan">Panduan</a></li>
                    <li class="nav-item"><a class="nav-link" href="#kontak">Kontak</a></li>

                    @auth
                        {{-- Jika user sudah login --}}
                        <li class="nav-item dropdown ms-lg-3">
                            <a class="nav-link dropdown-toggle d-flex align-items-center gap-2" href="#"
                                id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                                <span class="badge bg-primary rounded-circle"
                                    style="width: 32px; height: 32px; display: flex; align-items: center; justify-content: center;">
                                    {{ strtoupper(substr(Auth::user()->name, 0, 1)) }}
                                </span>
                                <span class="d-none d-lg-inline">{{ Auth::user()->name }}</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end" aria-labelledby="navbarDropdown">
                                {{-- <li><a class="dropdown-item" href="{{ route('dashboard') }}">Dashboard</a></li>
                                <li><a class="dropdown-item" href="{{ route('profile') }}">Profile</a></li>
                                <li>
                                    <hr class="dropdown-divider">
                                </li> --}}
                                <li>
                                    <form method="POST" action="{{ route('logout') }}">
                                        @csrf
                                        <button type="submit" class="dropdown-item text-danger">
                                            <i class="bi bi-box-arrow-right me-2"></i>Logout
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </li>
                    @else
                        {{-- Jika user belum login --}}
                        <li class="nav-item ms-lg-3">
                            <a href="{{ route('login') }}" class="btn btn-outline-primary btn-sm">Masuk</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('register') }}" class="btn btn-primary btn-sm">Daftar</a>
                        </li>
                    @endauth
                </ul>
            </div>
        </div>
    </nav>

    <!-- MAIN CONTENT -->
    <main class="flex-fill">
        <div class="container py-4">
            @yield('content')
        </div>
    </main>

    <!-- FOOTER -->
    <footer class="bg-dark text-light mt-auto">
        <div class="container py-5">
            <div class="row g-4">
                <div class="col-md-3">
                    <h5 class="fw-bold">Tentang Kami</h5>
                    <p class="small text-secondary">
                        Layanan Surat Desa Online adalah sistem pelayanan administrasi desa yang memudahkan warga
                        dalam mengurus berbagai keperluan surat menyurat.
                    </p>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">Layanan</h5>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-decoration-none text-secondary">Surat Keterangan</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Surat Pengantar</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Surat Izin</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Legalisir Dokumen</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">Bantuan</h5>
                    <ul class="list-unstyled small">
                        <li><a href="#" class="text-decoration-none text-secondary">Panduan Penggunaan</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">FAQ</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Hubungi Kami</a></li>
                        <li><a href="#" class="text-decoration-none text-secondary">Syarat & Ketentuan</a></li>
                    </ul>
                </div>
                <div class="col-md-3">
                    <h5 class="fw-bold">Kontak</h5>
                    <ul class="list-unstyled small text-secondary">
                        <li>📍 Jl. Desa Mranggen No. 123</li>
                        <li>📞 (024) 1234-5678</li>
                        <li>✉️ info@suratdesa.id</li>
                        <li>🕐 Senin - Jumat: 08.00 - 16.00</li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="text-center py-3 border-top border-secondary small text-secondary">
            &copy; 2024 Layanan Surat Desa Online - Desa Mranggen. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
