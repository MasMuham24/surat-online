<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Selamat Datang - Layanan Surat Desa Online</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
</head>

<body>
    <nav id="navbar">
        <div class="nav-container">
            <div class="logo-section">
                <div class="logo-icon">🏛️</div>
                <div class="logo-text">
                    <div class="logo-title">Surat Desa Online</div>
                    <div class="logo-subtitle">Desa Mranggen</div>
                </div>
            </div>

            <ul class="nav-links" id="navLinks">
                <li><a href="#beranda">Beranda</a></li>
                <li><a href="{{ route('surat.index') }}">Lapor Surat</a></li>
                <li><a href="#cara-kerja">Cara Kerja</a></li>
                <li><a href="#tentang">Tentang</a></li>
                <li><a href="#kontak">Kontak</a></li>

                @guest
                    <li>
                        <a href="{{ route('login') }}" class="btn-masuk">
                            Masuk
                        </a>
                    </li>
                @endguest

                @auth
                    <li>
                        <form action="{{ route('logout') }}" method="POST">
                            @csrf
                            <button type="submit" class="btn-masuk">
                                Logout
                            </button>
                        </form>
                    </li>
                @endauth
            </ul>

            <div class="hamburger" id="hamburger">
                <span></span>
                <span></span>
                <span></span>
            </div>
        </div>
    </nav>


    <section class="hero" id="beranda">
        <div class="hero-content">
            <h1>Layanan Surat Desa Online</h1>
            <p>Urus semua kebutuhan surat administrasi desa Anda dengan mudah, cepat, dan tanpa harus datang ke kantor
                desa. Tersedia 24/7 untuk kemudahan Anda!</p>
            <div class="hero-buttons">
                <a href="#daftar" class="btn-hero btn-primary">Mulai Sekarang</a>
                <a href="#cara-kerja" class="btn-hero btn-secondary">Cara Kerja</a>
            </div>
        </div>
    </section>

    <section class="features">
        <div class="container">
            <div class="section-title">
                <h2>Mengapa Memilih Kami?</h2>
                <p>Kemudahan dan kecepatan dalam satu platform</p>
            </div>
            <div class="feature-grid">
                <div class="feature-card">
                    <div class="feature-icon">⚡</div>
                    <h3>Proses Cepat</h3>
                    <p>Pengajuan surat diproses dalam waktu 1-3 hari kerja. Lebih cepat dari metode konvensional.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">📱</div>
                    <h3>Akses 24/7</h3>
                    <p>Ajukan surat kapan saja dan dimana saja melalui smartphone atau komputer Anda.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔒</div>
                    <h3>Aman & Terpercaya</h3>
                    <p>Data Anda dijamin aman dengan enkripsi tingkat tinggi dan sistem keamanan berlapis.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">🔍</div>
                    <h3>Lacak Real-time</h3>
                    <p>Pantau status pengajuan surat Anda secara real-time dari pengajuan hingga selesai.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">💰</div>
                    <h3>Hemat Biaya</h3>
                    <p>Tidak perlu biaya transportasi dan waktu ke kantor desa. Semua bisa dilakukan online.</p>
                </div>
                <div class="feature-card">
                    <div class="feature-icon">👥</div>
                    <h3>Dukungan Penuh</h3>
                    <p>Tim support kami siap membantu Anda jika mengalami kesulitan dalam penggunaan sistem.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="services" id="layanan">
        <div class="container">
            <div class="section-title">
                <h2>Layanan Surat Tersedia</h2>
                <p>Berbagai jenis surat administrasi desa yang dapat Anda ajukan</p>
            </div>
            <div class="service-grid">
                <div class="service-card">
                    <h3>📝 Surat Keterangan</h3>
                    <ul>
                        <li>Surat Keterangan Domisili</li>
                        <li>Surat Keterangan Usaha</li>
                        <li>Surat Keterangan Tidak Mampu</li>
                        <li>Surat Keterangan Penghasilan</li>
                        <li>Surat Keterangan Belum Menikah</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3>👥 Surat Pengantar</h3>
                    <ul>
                        <li>Pengantar KTP</li>
                        <li>Pengantar KK</li>
                        <li>Pengantar SKCK</li>
                        <li>Pengantar Nikah</li>
                        <li>Pengantar Pembuatan Akta</li>
                    </ul>
                </div>
                <div class="service-card">
                    <h3>📄 Surat Izin</h3>
                    <ul>
                        <li>Izin Keramaian</li>
                        <li>Izin Usaha Mikro</li>
                        <li>Izin Penggunaan Tanah</li>
                        <li>Izin Mendirikan Bangunan</li>
                        <li>Izin Kegiatan Sosial</li>
                    </ul>
                </div>
            </div>
        </div>
    </section>

    <section class="steps" id="cara-kerja">
        <div class="container">
            <div class="section-title">
                <h2>Cara Kerja Sistem</h2>
                <p>Mudah dan simpel, hanya dalam 4 langkah</p>
            </div>
            <div class="steps-grid">
                <div class="step-card">
                    <div class="step-number">1</div>
                    <h3>Daftar / Login</h3>
                    <p>Buat akun baru atau masuk dengan akun yang sudah ada untuk mengakses layanan.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">2</div>
                    <h3>Pilih Jenis Surat</h3>
                    <p>Pilih jenis surat yang ingin Anda ajukan dan isi formulir yang tersedia.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">3</div>
                    <h3>Upload Dokumen</h3>
                    <p>Upload dokumen persyaratan yang diperlukan sesuai jenis surat yang diajukan.</p>
                </div>
                <div class="step-card">
                    <div class="step-number">4</div>
                    <h3>Ambil Surat</h3>
                    <p>Setelah disetujui, Anda akan mendapat notifikasi dan bisa mengambil surat di kantor desa.</p>
                </div>
            </div>
        </div>
    </section>

    <section class="cta-section">
        <div class="container">
            <h2>Siap Menggunakan Layanan Kami?</h2>
            <p>Daftar sekarang dan nikmati kemudahan mengurus surat administrasi desa secara online</p>
            <a href="#daftar" class="btn-hero btn-primary">Daftar Sekarang - Gratis!</a>
        </div>
    </section>

    <footer id="kontak">
        <div class="footer-container">
            <div class="footer-section">
                <h3>Tentang Kami</h3>
                <p>Layanan Surat Desa Online adalah sistem pelayanan administrasi desa yang memudahkan warga dalam
                    mengurus berbagai keperluan surat menyurat.</p>
            </div>
            <div class="footer-section">
                <h3>Layanan</h3>
                <ul>
                    <li><a href="#">Surat Keterangan</a></li>
                    <li><a href="#">Surat Pengantar</a></li>
                    <li><a href="#">Surat Izin</a></li>
                    <li><a href="#">Legalisir Dokumen</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Bantuan</h3>
                <ul>
                    <li><a href="#">Panduan Penggunaan</a></li>
                    <li><a href="#">FAQ</a></li>
                    <li><a href="#">Hubungi Kami</a></li>
                    <li><a href="#">Syarat & Ketentuan</a></li>
                </ul>
            </div>
            <div class="footer-section">
                <h3>Kontak</h3>
                <ul>
                    <li>📍 Jl. Desa Mranggen No. 123</li>
                    <li>📞 (024) 1234-5678</li>
                    <li>✉️ info@suratdesa.id</li>
                    <li>🕐 Senin - Jumat: 08.00 - 16.00</li>
                </ul>
            </div>
        </div>
        <div class="footer-bottom">
            <p>&copy; 2024 Layanan Surat Desa Online - Desa Mranggen. All rights reserved.</p>
        </div>
    </footer>

    <script>
        const hamburger = document.getElementById('hamburger');
        const navLinks = document.getElementById('navLinks');
        const navbar = document.getElementById('navbar');

        hamburger.addEventListener('click', () => {
            hamburger.classList.toggle('active');
            navLinks.classList.toggle('active');
        });

        document.querySelectorAll('.nav-links a').forEach(link => {
            link.addEventListener('click', () => {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
            });
        });

        document.addEventListener('click', (e) => {
            if (!hamburger.contains(e.target) && !navLinks.contains(e.target)) {
                hamburger.classList.remove('active');
                navLinks.classList.remove('active');
            }
        });

        document.querySelectorAll('a[href^="#"]').forEach(anchor => {
            anchor.addEventListener('click', function(e) {
                e.preventDefault();
                const target = document.querySelector(this.getAttribute('href'));
                if (target) {
                    const offsetTop = target.offsetTop - 80;
                    window.scrollTo({
                        top: offsetTop,
                        behavior: 'smooth'
                    });
                }
            });
        });
    </script>
</body>

</html>
