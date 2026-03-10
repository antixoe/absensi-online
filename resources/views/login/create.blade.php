<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Halaman daftar</title>
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

        .register {
            background: rgba(255, 255, 255, 0.95);
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.3);
            backdrop-filter: blur(10px);
        }

        .register__head h2 {
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
    </style>
</head>
<body>
    <div class="container-fluid">
        <div class="register">
            <div class="register__content mt-3">
                <div class="register__head">
                    <h5 class=""><h2>Buat Akun</h2></h5>
                </div>
                <div class="register__form" style="margin-top: -25px;">
                    <form method="post" enctype="application/x-www-form-urlencoded" class="mb-3">
                        @csrf
                        <label for=""> <strong>Nama:</strong> </label>
                        <input type="text" name="nama" value="{{ old('nama') }}" placeholder="Nama ..." class="form-control @error('nama') is-invalid @enderror" required>
                        @error("nama")
                            <div class="invalid-feedback">
                                Nama harus ada!
                            </div>
                        @enderror

                        <label for="" class="mt-3"> <strong>Email:</strong> </label>
                        <input type="email" name="email" value="{{ old('email') }}" placeholder="Email ..." class="form-control @error('email') is-invalid @enderror" required>
                        @error('email')
                            <div class="invalid-feedback">
                                Format email salah!
                            </div>
                        @enderror
                        <div class="form-group">
                            <label for=""> <strong>Password:</strong> </label>
                            <input type="password" name="password" value="" placeholder="Password ..." id="change_password"class="form-control @error('password') is-invalid @enderror" required>
                            @error('password')
                                <div class="invalid-feedback">
                                    Password harus mengandung karakter angka, huruf minimal 8 karakter, minimal 1 huruf kapital, minimal 1 simbol(@$!'%*#?&) dan harus sama dengan "ulangi password"!
                                </div>
                            @enderror
                            <div class="row container">
                                <input type="checkbox" name="" value="" onclick='click_hidden()' id="asd"> <label for="asd"><small id="hidden_password" class="form-text text-muted mt-2"> &nbsp;Lihat password</small></label>
                            </div>
                        </div>
                        <label for=""> <strong>Ulangi password:</strong> </label>
                        <input type="password" name="password_repeat" value="" placeholder="Ulangi Password ..." class="form-control @error('password_repeat') is-invalid @enderror" required>
                        @error('password_repeat')
                            <div class="invalid-feedback">
                                Ulangi password harus terisi!
                            </div>
                        @enderror

                        <div class="register__form-action mt-3">
                            <button type="submit" class="btn btn--blue col-md-12">Daftar</button>
                        </div>
                    </form>
                </div>
            </div>
            <a href="{{ route('/') }}" class="btn btn--link mb-3">Sudah punya akun? Login!</a>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script type="text/javascript">
    // Enhanced form interactions
    document.addEventListener('DOMContentLoaded', function() {
        // Add loading states to buttons
        const forms = document.querySelectorAll('form');
        forms.forEach(form => {
            form.addEventListener('submit', function() {
                const submitBtn = form.querySelector('input[type="submit"], button[type="submit"]');
                if (submitBtn) {
                    submitBtn.innerHTML = 'Loading...';
                    submitBtn.disabled = true;
                }
            });
        });
    });

    function click_hidden(){
        var input_hidden = document.getElementById("change_password");
        var tulisan_hidden = document.getElementById("hidden_password");
        if (input_hidden.type == "password") {
            input_hidden.type = "text";
            tulisan_hidden.innerHTML = "&nbsp;Sembunyikan password"
        }else{
            input_hidden.type = "password";
            tulisan_hidden.innerHTML = "&nbsp;Lihat password"
        }
    }
    $(document).ready(function () {
    });
    @if(session("berhasil"))
    Swal.fire({
      title: "Berhasil!",
      text: "Berhasil membuat akun, silahkan menunggu konfirmasi administrator selanjutnya!",
      icon: "success"
    });
    @elseif(session('gagal'))
    Swal.fire({
      title: "Gagal!",
      text: "Gagal membuat akun, silahkan menghubungi administrator!",
      icon: "error"
    });
    @endif
    @if(session('email_exists'))
    Swal.fire({
      title: "Gagal!",
      text: "Email sudah ada, silahkan hubungi operator!",
      icon: "error"
    });
    @endif
    </script>
</body>
</html>
