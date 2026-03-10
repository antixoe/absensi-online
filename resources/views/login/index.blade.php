<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag wajib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Login - Absensi Online</title>
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

        .login-wrapper {
            width: 100%;
            max-width: 420px;
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

        .login-card {
            background: rgba(255, 255, 255, 0.98);
            border-radius: 20px;
            box-shadow: 0 20px 60px rgba(0, 0, 0, 0.25);
            overflow: hidden;
            backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.2);
        }

        .login-header {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            padding: 40px 30px 30px;
            text-align: center;
            position: relative;
        }

        .login-header::after {
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

        .login-icon {
            font-size: 32px;
            color: white;
            margin-bottom: 15px;
        }

        .login-header h1 {
            color: white;
            font-size: 28px;
            font-weight: 700;
            margin: 0;
            letter-spacing: -0.5px;
        }

        .login-header p {
            color: rgba(255, 255, 255, 0.8);
            font-size: 14px;
            margin-top: 8px;
            margin-bottom: 0;
        }

        .login-body {
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

        .login-footer {
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

        .error-message {
            color: #e74c3c;
            font-size: 12px;
            margin-top: 6px;
            display: flex;
            align-items: center;
            gap: 5px;
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

        @media (max-width: 480px) {
            .login-card {
                border-radius: 15px;
            }

            .login-body {
                padding: 40px 20px 20px;
            }

            .login-header {
                padding: 30px 20px 20px;
            }

            .login-header h1 {
                font-size: 24px;
            }
        }
    </style>
</head>
<body>
    <div class="login-wrapper">
        <div class="login-card">
            <div class="login-header">
                <div class="login-icon">
                    <i class="fa fa-sign-in"></i>
                </div>
                <h1>Masuk</h1>
                <p>Selamat datang kembali!</p>
            </div>

            <div class="login-body">
                <form method="post" enctype="application/x-www-form-urlencoded">
                    @csrf

                    <div class="form-group">
                        <label for="email">Email</label>
                        <div class="input-group-wrapper">
                            <i class="fa fa-envelope input-icon"></i>
                            <input type="email" name="email" id="email" value="{{ old('email') }}" placeholder="nama@email.com" class="form-control @error('email') is-invalid @enderror" required>
                        </div>
                        @error('email')
                            <div class="invalid-feedback" style="display: block;">
                                <i class="fa fa-exclamation-circle"></i> Email tidak boleh kosong!
                            </div>
                        @enderror
                    </div>

                    <div class="form-group">
                        <label for="password">Password</label>
                        <div class="input-group-wrapper">
                            <i class="fa fa-lock input-icon"></i>
                            <input type="password" id="change_password" name="password" value="{{ old('password') }}" placeholder="Masukkan password..." class="form-control @error('password') is-invalid @enderror" required>
                            <button type="button" class="password-toggle" onclick="click_change()">
                                <i class="fa fa-eye" id="password-icon"></i>
                            </button>
                        </div>
                        @error('password')
                            <div class="invalid-feedback" style="display: block;">
                                <i class="fa fa-exclamation-circle"></i> Password tidak boleh kosong!
                            </div>
                        @enderror
                    </div>

                    <div class="show-password">
                        <input type="checkbox" id="show-pwd" onclick="click_change()">
                        <label for="show-pwd">Tampilkan password</label>
                    </div>

                    <button type="submit" class="btn btn--blue" style="margin-top: 28px;">
                        <i class="fa fa-sign-in"></i> Login
                    </button>
                </form>
            </div>

            <div class="login-footer">
                <span style="color: #999; font-size: 13px;">Belum punya akun? </span>
                <a href="{{ route('login.create') }}" class="btn--link">
                    <i class="fa fa-user-plus"></i> Daftar Sekarang
                </a>
            </div>
        </div>
    </div>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
        function click_change() {
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
                    submitBtn.innerHTML = '<i class="fa fa-spinner fa-spin"></i> Memproses...';
                    submitBtn.disabled = true;
                });
            }
        });
    </script>
</body>
</html>
                document.getElementById(modalId).style.display = 'none';
            }
        };

        // Close modal when clicking outside
        window.onclick = function(event) {
            if (event.target.classList.contains('modal')) {
                event.target.style.display = 'none';
            }
        };

        var tulisan_hidden = document.getElementById("hidden_password");
        var password = document.getElementById("change_password");
        function click_change() {
            if (password.type == "password") {
                tulisan_hidden.innerHTML = "&nbsp;Sembunyikan password";
                password.type = "text";
            }else{
                tulisan_hidden.innerHTML = "&nbsp;Lihat password";
                password.type = "password";
            }
        }

        // Enhanced form interactions
        document.addEventListener('DOMContentLoaded', function() {
            // Add loading states to buttons
            const forms = document.querySelectorAll('form');
            forms.forEach(form => {
                form.addEventListener('submit', function() {
                    const submitBtn = form.querySelector('input[type="submit"], button[type="submit"]');
                    if (submitBtn) {
                        submitBtn.value = 'Loading...';
                        submitBtn.disabled = true;
                    }
                });
            });

            @if(session('success_login'))
                Modal.open('successModal');
            @endif
        });

        @if(session('error'))
            Swal.fire({
              title: "Gagal!",
              text: "Username atau password salah!",
              icon: "error"
            });
        @endif
        @if(session('not_acc'))
            Swal.fire({
              title: "Gagal!",
              text: "Akun belum aktif, silahkan hubungi operator!",
              icon: "error"
            });
        @endif
    </script>

    <!-- Success Modal -->
    <div id="successModal" class="modal">
        <div class="modal-content">
            <span class="close" onclick="Modal.close('successModal')">&times;</span>
            <h2>Berhasil!</h2>
            <p>Login berhasil! Mengalihkan...</p>
        </div>
    </div>

</body>
</html>
