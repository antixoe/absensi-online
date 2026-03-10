<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Buat Akun - Absensi Online</title>
    <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/reza-admin.min.css') }}">
    <link rel="icon" href="https://incrustwerush.org/img/site/icon.ico">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
            padding: 20px;
        }

        .register-wrapper {
            width: 100%;
            max-width: 500px;
            animation: slideUp 0.6s ease-out;
        }

        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .register-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .register-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px 30px;
            text-align: center;
            position: relative;
        }

        .register-header::after {
            content: '';
            position: absolute;
            bottom: -15px;
            left: 50%;
            transform: translateX(-50%);
            width: 60px;
            height: 60px;
            background: rgba(255, 255, 255, 0.98);
            border-radius: 50%;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .register-icon {
            font-size: 32px;
            color: white;
            margin-bottom: 15px;
        }

        .register-header h1 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .register-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-top: 8px;
            margin-bottom: 0;
        }

        .register-body {
            padding: 50px 30px 30px;
        }

        .form-group {
            margin-bottom: 22px;
        }

        .form-group label {
            display: block;
            font-weight: 600;
            color: #333;
            margin-bottom: 8px;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }

        .input-group-wrapper {
            position: relative;
            display: flex;
            align-items: center;
        }

        .input-icon {
            position: absolute;
            left: 15px;
            color: #667eea;
            font-size: 16px;
            pointer-events: none;
            z-index: 1;
        }

        .form-control {
            border: 2px solid #e0e0e0;
            border-radius: 12px;
            padding: 12px 15px 12px 45px;
            font-size: 14px;
            transition: all 0.3s ease;
            background: #f8f9fa;
            width: 100%;
        }

        .form-control:focus {
            border-color: #667eea;
            background: white;
            box-shadow: 0 0 0 4px rgba(102, 126, 234, 0.1);
            outline: none;
        }

        .form-control::placeholder {
            color: #999;
        }

        .password-toggle {
            position: absolute;
            right: 15px;
            background: none;
            border: none;
            cursor: pointer;
            color: #667eea;
            font-size: 18px;
            padding: 0;
            width: 30px;
            height: 30px;
            display: flex;
            align-items: center;
            justify-content: center;
            transition: color 0.2s;
            z-index: 2;
        }

        .password-toggle:hover {
            color: #764ba2;
        }

        .show-password {
            display: flex;
            align-items: center;
            margin-top: 12px;
        }

        .show-password input[type="checkbox"] {
            width: 16px;
            height: 16px;
            cursor: pointer;
            accent-color: #667eea;
        }

        .show-password label {
            margin: 0 0 0 8px;
            font-weight: 500;
            color: #666;
            font-size: 12px;
            cursor: pointer;
            text-transform: none;
            letter-spacing: normal;
        }

        .btn--blue {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border: none;
            border-radius: 12px;
            color: white;
            font-weight: 600;
            padding: 12px 30px;
            font-size: 14px;
            transition: all 0.3s ease;
            width: 100%;
            cursor: pointer;
            text-transform: uppercase;
            letter-spacing: 0.5px;
            box-shadow: 0 5px 15px rgba(102, 126, 234, 0.3);
        }

        .btn--blue:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 25px rgba(102, 126, 234, 0.4);
        }

        .btn--blue:active {
            transform: translateY(0);
        }

        .register-footer {
            padding: 20px 30px 30px;
            border-top: 1px solid #f0f0f0;
            text-align: center;
        }

        .btn--link {
            color: #667eea;
            text-decoration: none;
            font-weight: 600;
            font-size: 13px;
            transition: all 0.2s;
            display: inline-block;
        }

        .btn--link:hover {
            color: #764ba2;
            text-decoration: underline;
        }

        .form-control.is-invalid {
            border-color: #e74c3c;
            background-color: #fff5f5;
        }

        .invalid-feedback {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 6px;
            display: block;
        }

        @media (max-width: 520px) {
            .register-card {
                border-radius: 15px;
            }

            .register-body {
                padding: 40px 20px 20px;
            }

            .register-header {
                padding: 30px 20px 20px;
            }

            .register-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="register-wrapper">
        <div class="register-card">
            <div class="register-header">
                <div class="register-icon">
                    <i class="fa fa-user-plus"></i>
                </div>
                <h1>Daftar Akun</h1>
                <p>Bergabunglah dengan kami hari ini</p>
            </div>

            <div class="register-body">
                <form method="post" enctype="application/x-www-form-urlencoded">
                    @csrf

                    <div class="form-group">
                        <label for="nama">Nama Lengkap</label>
                        <div class="input-group-wrapper">
                            <i class="fa fa-user input-icon"></i>
                            <input type="text" name="nama" id="nama" value="{{ old('nama') }}" placeholder="Masukkan nama lengkap..." class="form-control @error('nama') is-invalid @enderror" required>
                        </div>
                        @error("nama")
                            <div class="invalid-feedback">
                                <i class="fa fa-exclamation-circle"></i> Nama harus ada!
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group-wrapper">
                            <i class="fa fa-envelope input-icon"></i>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="nama@email.com" class="form-control @error('email') is-invalid @enderror" required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback">
                                <i class="fa fa-exclamation-circle"></i> Format email tidak valid!
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group-wrapper">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" name="password" id="change_password" value="" placeholder="Buat password yang kuat..." class="form-control @error('password') is-invalid @enderror" required>
                            <button type="button" class="password-toggle" onclick="click_hidden()">
                                <i class="fa fa-eye" id="password-icon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback" style="display: block;">
                                <i class="fa fa-exclamation-circle"></i> Password harus minimal 8 karakter, dengan angka, huruf besar, dan simbol!
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password_repeat">Konfirmasi Password</label>
                        <div class="input-group-wrapper">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" name="password_repeat" id="password_repeat" value="" placeholder="Ulangi password..." class="form-control @error('password_repeat') is-invalid @enderror" required>
                        </div>
                        @error('password_repeat')
                            <div class="invalid-feedback">
                                <i class="fa fa-exclamation-circle"></i> Password tidak cocok!
                            </div>
                        @enderror
                    </div>

                    <div class="show-password">
                        <input type="checkbox" id="show-pwd" onclick="click_hidden()">
                        <label for="show-pwd">Tampilkan password</label>
                    </div>

                    <button type="submit" class="btn btn--blue" style="margin-top: 28px;">
                        <i class="fa fa-user-plus"></i> Daftar Sekarang
                    </button>
                </form>
            </div>

            <div class="register-footer">
                <span style="color: #999; font-size: 13px;">Sudah punya akun? </span>
                <a href="{{ route('/') }}" class="btn--link">
                    <i class="fa fa-sign-in"></i> Login di Sini
                </a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        function click_hidden() {
            var input_hidden = document.getElementById("change_password");
            var icon = document.getElementById("password-icon");
            var checkbox = document.getElementById("show-pwd");

            if (input_hidden.type == "password") {
                input_hidden.type = "text";
                icon.classList.remove("fa-eye");
                icon.classList.add("fa-eye-slash");
                checkbox.checked = true;
            } else {
                input_hidden.type = "password";
                icon.classList.remove("fa-eye-slash");
                icon.classList.add("fa-eye");
                checkbox.checked = false;
            }
        }

        // Form validation with animation
        document.addEventListener('DOMContentLoaded', function() {
            const form = document.querySelector('form');
            if (form) {
                form.addEventListener('submit', function(e) {
                    const submitBtn = form.querySelector('button[type="submit"]');
                    submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Mendaftar...';
                    submitBtn.disabled = true;
                });
            }
        });

        // Alert handlers
        @if(session("berhasil"))
        Swal.fire({
            title: "Berhasil!",
            text: "Akun berhasil dibuat. Silakan menunggu konfirmasi administrator!",
            icon: "success",
            confirmButtonColor: "#667eea"
        });
        @elseif(session('gagal'))
        Swal.fire({
            title: "Gagal!",
            text: "Gagal membuat akun. Silakan hubungi administrator!",
            icon: "error",
            confirmButtonColor: "#667eea"
        });
        @endif

        @if(session('email_exists'))
        Swal.fire({
            title: "Email Sudah Terdaftar!",
            text: "Email ini sudah digunakan. Silakan gunakan email lain atau hubungi operator!",
            icon: "warning",
            confirmButtonColor: "#667eea"
        });
        @endif
    </script>
</body>
</html>
