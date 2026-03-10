<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tag wajib -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman Login</title>
    <link rel="stylesheet" href="{{ asset('/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/plugins/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('/dist/css/reza-admin.min.css') }}">
    <link rel="icon" href="https://incrustwerush.org/img/site/icon.ico">
    <style>
        /* Custom styles for better UI */
        body {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        }

        .login {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .login__head h2 {
            color: #333;
            font-weight: 600;
        }

        .btn--blue {
            background: linear-gradient(45deg, #2196F3, #21CBF3);
            border: none;
            border-radius: 25px;
            color: white;
            transition: all 0.3s ease;
        }

        .btn--blue:hover {
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(33, 150, 243, 0.4);
        }

        .form-control {
            border-radius: 10px;
            border: 1px solid #ddd;
            padding: 10px 15px;
            transition: border-color 0.3s ease;
        }

        .form-control:focus {
            border-color: #2196F3;
            box-shadow: 0 0 0 0.2rem rgba(33, 150, 243, 0.25);
        }

        .btn--link {
            color: #2196F3;
            text-decoration: none;
            font-weight: 500;
        }

        .btn--link:hover {
            text-decoration: underline;
        }

        /* Modal styles */
        .modal {
            display: none;
            position: fixed;
            z-index: 1000;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
        }

        .modal-content {
            background-color: #fff;
            margin: 15% auto;
            padding: 20px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.3);
        }

        .close {
            color: #aaa;
            float: right;
            font-size: 28px;
            font-weight: bold;
            cursor: pointer;
        }

        .close:hover {
            color: #000;
        }
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="login">
            <div class="login__content mt-3">
                <div class="login__head">
                    <h2 class="mt-3">Selamat datang!</h2>
                </div>
                <div class="login__form">
                    <form method="post" enctype="application/x-www-form-urlencoded">
                        @csrf
                        <label for="email"><strong>Email:</strong></label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="example@example.com" class="form-control @error('email') is-invalid @enderror">
                        @error('email')
                            <div class="invalid-feedback">
                                Email tidak boleh kosong!
                            </div>
                        @enderror
                        <label for="password" class="mt-3"><strong>Password:</strong></label>
                        <input type="password" id="change_password" name="password" value="{{ old('password') }}" placeholder="Password..." class="form-control @error('password') is-invalid @enderror">
                        @error('password')
                        <div class="invalid-feedback">
                            Password tidak boleh kosong!
                        </div>
                        @enderror
                        <div class="container">
                            <div class="row">
                                <input type="checkbox" value="" onclick="click_change()" id="asd">
                                <label for="asd"><small id="hidden_password" class="form-text text-muted mt-2"> &nbsp;Lihat password</small></label>
                            </div>
                        </div>

                        <div class="login__form-action mt-3">
                            <!-- <button type="submit" class="btn btn--blue col-md-12 mb-2 mb-sm-0">Login</button> -->
                            <input type="submit" name="submit" class="btn btn--blue col-md-12 mb-2 mb-sm-0" value="Login">
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{ route('login.create') }}" class="btn btn--link mb-3">Buat Akun</a>
        </div><!-- login -->
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript">
        // Custom modal functionality
        var Modal = {
            open: function(modalId) {
                document.getElementById(modalId).style.display = 'block';
            },
            close: function(modalId) {
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
