<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login - Layanan Surat Online</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/login.css') }}">
</head>

<body>
    <div class="login-wrapper">
        @if ($errors->any() || session('error') || session('failed'))
            <div class="alert alert-danger alert-custom" id="alertBox" role="alert">
                <div class="d-flex align-items-start">
                    <i class="bi bi-exclamation-triangle-fill me-3 fs-5"></i>
                    <div class="grow">
                        @if (session('error'))
                            <div class="mb-1"><strong>Login Gagal!</strong></div>
                            <div>{{ session('error') }}</div>
                        @endif
                        @if (session('failed'))
                            <div class="mb-1"><strong>Login Gagal!</strong></div>
                            <div>{{ session('failed') }}</div>
                        @endif
                        @if ($errors->any())
                            <ul class="mb-0 ps-3 mt-2">
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        @endif
                    </div>
                </div>
            </div>
        @endif

        <div class="login-container">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="bi bi-envelope-paper"></i>
                </div>
                <h1>Layanan Surat Online</h1>
                <p>Sistem Administrasi Persuratan Digital</p>
            </div>

            <form method="POST" action="/login">
                @csrf
                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope me-1"></i>Email
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="Masukkan email Anda" value="{{ old('email') }}" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label for="password" class="form-label">
                        <i class="bi bi-shield-lock me-1"></i>Password
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Masukkan password Anda" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-login w-100 mb-3">
                    <i class="bi bi-box-arrow-in-right me-2"></i>Masuk ke Sistem
                </button>

                <div class="divider">
                    <span>atau</span>
                </div>

                <div class="text-center">
                    <a href="{{ route('register') }}" class="register-link">
                        <i class="bi bi-person-plus-fill"></i>
                        Daftar Akun Baru
                    </a>
                </div>
            </form>

            <div class="feature-info">
                <small>
                    <i class="bi bi-shield-check"></i>
                    Sistem aman dan terenkripsi untuk manajemen surat
                </small>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script>
        document.addEventListener("DOMContentLoaded", function() {
            var alertBox = document.getElementById("alertBox");
            if (alertBox) {
                setTimeout(function() {
                    alertBox.classList.add("fade-out");
                    setTimeout(function() {
                        alertBox.remove();
                    }, 500);
                }, 3000);
            }
        });
    </script>
</body>

</html>
