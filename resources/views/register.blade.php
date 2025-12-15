<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register - Layanan Surat Online</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.0/font/bootstrap-icons.css">
    <link rel="stylesheet" href="{{ asset('css/register.css') }}">
</head>

<body>
    <div class="register-wrapper">
        @if ($errors->any())
            <div class="alert alert-danger alert-custom" id="alertBox" role="alert">
                <div class="d-flex align-items-start">
                    <i class="bi bi-exclamation-triangle-fill me-3 fs-5"></i>
                    <div class="grow">
                        <div class="mb-1"><strong>Pendaftaran Gagal!</strong></div>
                        <ul class="mb-0 ps-3 mt-2">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>
        @endif

        <div class="register-container">
            <div class="logo-section">
                <div class="logo-icon">
                    <i class="bi bi-envelope-paper"></i>
                </div>
                <h1>Daftar Akun Baru</h1>
                <p>Sistem Administrasi Persuratan Digital</p>
            </div>

            <form action="/register" method="post">
                @csrf

                <div class="mb-3">
                    <label for="name" class="form-label">
                        <i class="bi bi-person-badge me-1"></i>Nama Lengkap
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-person"></i>
                        </span>
                        <input type="text" class="form-control" id="name" name="name"
                            placeholder="Masukkan nama lengkap Anda" value="{{ old('name') }}" required>
                    </div>
                </div>

                <div class="mb-3">
                    <label for="email" class="form-label">
                        <i class="bi bi-envelope me-1"></i>Email
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-envelope-fill"></i>
                        </span>
                        <input type="email" class="form-control" id="email" name="email"
                            placeholder="email@example.com" value="{{ old('email') }}" required>
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
                            placeholder="Buat password yang kuat" required>
                    </div>
                    <small class="text-muted">
                        <i class="bi bi-info-circle me-1"></i>
                        Minimal 6 karakter
                    </small>
                </div>

                <div class="mb-4">
                    <label for="password_confirmation" class="form-label">
                        <i class="bi bi-shield-check me-1"></i>Konfirmasi Password
                    </label>
                    <div class="input-group">
                        <span class="input-group-text">
                            <i class="bi bi-lock-fill"></i>
                        </span>
                        <input type="password" class="form-control" id="password_confirmation"
                            name="password_confirmation" placeholder="Ulangi password Anda" required>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-register w-100 mb-3">
                    <i class="bi bi-person-plus me-2"></i>Daftar Sekarang
                </button>

                <div class="divider">
                    <span>atau</span>
                </div>

                <div class="text-center">
                    <a href="{{ route('login') }}" class="login-link">
                        <i class="bi bi-box-arrow-in-right"></i>
                        Sudah Punya Akun? Masuk Di Sini
                    </a>
                </div>
            </form>
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
                }, 4000);
            }

            // Password strength indicator
            const passwordInput = document.getElementById('password');
            const passwordConfirm = document.getElementById('password_confirmation');

            passwordInput.addEventListener('input', function() {
                const strength = this.value.length;
                if (strength >= 6 && strength <= 8) {
                    this.style.borderColor = '#28a745';
                } else if (strength > 8) {
                    this.style.borderColor = '#dc3545';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });

            // Password confirmation match indicator
            passwordConfirm.addEventListener('input', function() {
                if (this.value === passwordInput.value && this.value.length > 0) {
                    this.style.borderColor = '#28a745';
                } else if (this.value.length > 0) {
                    this.style.borderColor = '#dc3545';
                } else {
                    this.style.borderColor = '#e9ecef';
                }
            });
        });
    </script>
</body>

</html>
