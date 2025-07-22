<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>HANGNAMA CAR - Signup</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <style>
        /* Tetapkan gaya yang relevan ke dalam file CSS terpisah Anda, atau biarkan di sini jika hanya untuk halaman ini */
        /* Contoh style dari snippets/assets/dist/css/bootstrap.min.css mungkin perlu dipindahkan ke stylesub.css atau disesuaikan */
        body {
            background-color: #E0F2F7;
            /* Mengikuti tema pastel biru */
        }

        .form-signin {
            max-width: 400px;
            padding: 15px;
        }

        .form-signin .form-floating:focus-within {
            z-index: 2;
        }

        .form-signin input[type="email"],
        .form-signin input[type="text"],
        .form-signin input[type="password"],
        .form-signin select {
            margin-bottom: 10px;
            /* Jarak antar input */
            border-radius: .375rem;
            /* Ikuti Bootstrap 5 */
        }

        .text-body-emphasis {
            color: #263238 !important;
        }

        /* Darker text for readability */
        .text-body-secondary {
            color: #546E7A !important;
        }

        /* Slightly lighter dark text */
        .btn-primary {
            background-color: #00BCD4;
            border-color: #00BCD4;
        }

        .btn-primary:hover {
            background-color: #00ACC1;
            border-color: #00ACC1;
        }

        .bg-body-tertiary {
            background-color: #F0F8FA !important;
        }

        /* Lighter pastel blue for form elements */

        /* Hapus style yang tidak relevan atau conflict dengan Bootstrap 5/style Anda */
        .bd-placeholder-img {
            /* Hapus jika tidak digunakan */
        }

        @media (min-width: 768px) {
            /* Hapus jika tidak digunakan */
        }

        .b-example-divider {
            /* Hapus jika tidak digunakan */
        }

        .b-example-vr {
            /* Hapus jika tidak digunakan */
        }

        .bi {
            /* Hapus jika tidak digunakan, Bootstrap Icons sudah diimport di project1.blade.php */
        }

        .nav-scroller {
            /* Hapus jika tidak digunakan */
        }

        .nav-scroller .nav {
            /* Hapus jika tidak digunakan */
        }

        .btn-bd-primary {
            /* Hapus jika Anda ingin menggunakan .btn-primary default Bootstrap */
        }

        .bd-mode-toggle {
            /* Ini adalah mode toggle Bootstrap, bisa dipertahankan atau dihapus */
        }

        .bd-mode-toggle .dropdown-menu .active .bi {
            /* Hapus jika tidak digunakan */
        }
    </style>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Load saved email if available
            const savedEmail = localStorage.getItem('savedEmail');
            if (savedEmail) {
                document.getElementById('email').value = savedEmail;
                document.getElementById('flexCheckDefault').checked = true;
            }
        });

        // Validasi JavaScript ini akan kita sesuaikan dengan validasi Laravel
        // Namun, jika Anda ingin validasi sisi klien juga, sesuaikan pesan error dengan Laravel.
        // Untuk saat ini, saya akan menyederhanakannya karena validasi utama ada di Controller.
        function validateForm() {
            var password = document.getElementById("password");
            var repassword = document.getElementById("password_confirmation"); // Ganti id
            var agreeTerms = document.getElementById("switch1");
            var fullname = document.getElementById("fullname");
            var email = document.getElementById("email");
            var role = document.getElementById("role");

            // Basic client-side validation (Laravel will handle robust validation)
            if (fullname.value.trim() === "") {
                Swal.fire("Nama lengkap harus diisi.");
                return false;
            }
            if (email.value.trim() === "") {
                Swal.fire("Alamat email harus diisi.");
                return false;
            }
            if (password.value.trim() === "") {
                Swal.fire("Password harus diisi.");
                return false;
            }
            if (password.value.length < 8) {
                Swal.fire("Password harus memiliki minimal 8 karakter.");
                return false;
            }
            if (password.value !== repassword.value) {
                Swal.fire("Konfirmasi password tidak cocok.");
                return false;
            }
            if (!agreeTerms.checked) {
                Swal.fire("Anda harus setuju dengan peraturan.");
                return false;
            }
            if (role.value === "") {
                Swal.fire("Silakan pilih jenis akun.");
                return false;
            }

            return true; // Form can be submitted
        }
    </script>

    <link href="{{ asset('css/stylesub.css') }}" rel="stylesheet">
</head>

<body class="d-flex align-items-center py-4 bg-body-tertiary">

    <div style="position: fixed; top: 2vh; right: 2vw;">
        <div class="HideDiv" style="float: right;">
            {{-- Ubah onclick untuk kembali ke /project1 --}}
            <i class="HideDiv fa fa-close" style="font-size:24px; color: red;"
                onclick="window.location.href = '{{ url('/project1') }}';"></i>
        </div>
    </div>

    {{-- Theme toggle SVG symbols and dropdown (bisa dipertahankan atau dihapus jika tidak digunakan) --}}
    <svg xmlns="http://www.w3.org/2000/svg" class="d-none">
        <symbol id="check2" viewBox="0 0 16 16">
            <path
                d="M13.854 3.646a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708 0l-3.5-3.5a.5.5 0 1 1 .708-.708L6.5 10.293l6.646-6.647a.5.5 0 0 1 .708 0z" />
        </symbol>
        <symbol id="circle-half" viewBox="0 0 16 16">
            <path d="M8 15A7 7 0 1 0 8 1v14zm0 1A8 8 0 1 1 8 0a8 8 0 0 1 0 16z" />
        </symbol>
        <symbol id="moon-stars-fill" viewBox="0 0 16 16">
            <path
                d="M6 .278a.768.768 0 0 1 .08.858 7.208 7.208 0 0 0-.878 3.46c0 4.021 3.278 7.277 7.318 7.277.527 0 1.04-.055 1.533-.16a.787.787 0 0 1 .81.316.733.733 0 0 1-.031.893A8.349 8.349 0 0 1 8.344 16C3.734 16 0 12.286 0 7.71 0 4.266 2.114 1.312 5.124.06A.752.752 0 0 1 6 .278z" />
            <path
                d="M10.794 3.148a.217.217 0 0 1 .412 0l.387 1.162c.173.518.579.924 1.097 1.097l1.162.387a.217.217 0 0 1 0 .412l-1.162.387a1.734 1.734 0 0 0-1.097 1.097l-.387 1.162a.217.217 0 0 1-.412 0l-.387-1.162A1.734 1.734 0 0 0 9.31 6.593l-1.162-.387a.217.217 0 0 1 0-.412l1.162-.387a1.734 1.734 0 0 0 1.097-1.097l.387-1.162zM13.863.099a.145.145 0 0 1 .274 0l.258.774c.115.346.386.617.732.732l.774.258a.145.145 0 0 1 0 .274l-.774.258a1.156 1.156 0 0 0-.732.732l-.258.774a.145.145 0 0 1-.274 0l-.258-.774a1.156 1.156 0 0 0-.732-.732l-.774-.258a.145.145 0 0 1 0-.274l.774-.258c.346-.115.617-.386.732-.732L13.863.1z" />
        </symbol>
        <symbol id="sun-fill" viewBox="0 0 16 16">
            <path
                d="M8 12a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
        </symbol>
    </svg>

    <div class="dropdown position-fixed bottom-0 end-0 mb-3 me-3 bd-mode-toggle">
        <button class="btn btn-bd-primary py-2 dropdown-toggle d-flex align-items-center" id="bd-theme" type="button"
            aria-expanded="false" data-bs-toggle="dropdown" aria-label="Toggle theme (auto)">
            <svg class="bi my-1 theme-icon-active" width="1em" height="1em">
                <use href="#circle-half"></use>
            </svg>
            <span class="visually-hidden" id="bd-theme-text">Toggle theme</span>
        </button>
        <ul class="dropdown-menu dropdown-menu-end shadow" aria-labelledby="bd-theme-text">
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="light"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#sun-fill"></use>
                    </svg>
                    Light
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center" data-bs-theme-value="dark"
                    aria-pressed="false">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#moon-stars-fill"></use>
                    </svg>
                    Dark
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
            <li>
                <button type="button" class="dropdown-item d-flex align-items-center active" data-bs-theme-value="auto"
                    aria-pressed="true">
                    <svg class="bi me-2 opacity-50 theme-icon" width="1em" height="1em">
                        <use href="#circle-half"></use>
                    </svg>
                    Auto
                    <svg class="bi ms-auto d-none" width="1em" height="1em">
                        <use href="#check2"></use>
                    </svg>
                </button>
            </li>
        </ul>
    </div>

    <main class="form-signin w-100 m-auto">
        <div style="padding: 23%; padding-top: 0px; padding-bottom: 0px;">
            <img id="logo" src="{{ asset('img/LogoYS.png') }}" alt="" width="150px"
                style="border-radius: 25px;">
        </div>
        <form action="{{ route('register.store') }}" method="POST" onsubmit="return validateForm();">
            @csrf

            <h1 class="h3 mb-3 fw-normal text-body-emphasis" style="text-align: center;">Please Sign Up</h1>

            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="form-floating">
                <input type="text" class="form-control bg-body-tertiary @error('fullname') is-invalid @enderror"
                    id="fullname" name="fullname" placeholder="Full Name" value="{{ old('fullname') }}" required
                    autofocus>
                <label for="fullname" class="text-body-emphasis">Full Name</label>
                @error('fullname')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="email" class="form-control bg-body-tertiary @error('email') is-invalid @enderror"
                    id="email" name="email" placeholder="name@example.com" value="{{ old('email') }}"
                    required>
                <label for="email" style="background-color: transparent;" class="text-body-emphasis">Email
                    address</label>
                @error('email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-floating">
                <input type="password" class="form-control bg-body-tertiary @error('password') is-invalid @enderror"
                    id="password" name="password" placeholder="password" required>
                <label for="password" class="text-body-emphasis">Password</label>
                @error('password')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a class="text-body-secondary">
                <p><small><small>Password harus memiliki 8 karakter dan berisi setidaknya satu dari tiga simbol
                            berikut: #, $,
                            &</small></small></p>
            </a>
            <div class="form-floating">
                <input type="password"
                    class="form-control bg-body-tertiary @error('password_confirmation') is-invalid @enderror"
                    id="password_confirmation" name="password_confirmation" placeholder="password" required>
                <label for="password_confirmation" class="text-body-emphasis">Type your password again</label>
                @error('password_confirmation')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <div class="form-floating mb-3">
                <select class="form-select bg-body-tertiary @error('role') is-invalid @enderror" id="role"
                    name="role" required>
                    <option value="">Pilih Jenis Akun</option>
                    <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                    <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                </select>
                <label for="role" class="text-body-emphasis">Jenis Akun</label>
                @error('role')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>

            <a class="text-body-secondary">
                <p><small>Untuk memulai, pastikan Anda telah membaca dan menyetujui
            </a> <a href="{{ url('peraturan.html') }}">peraturan</a> <a class="text-body-secondary">yang
                telah dibuat</small></p>
            </a>
            <div>
                <div class="custom-control custom-switch">
                    <input type="checkbox" class="custom-control-input @error('agree_terms') is-invalid @enderror"
                        id="switch1" name="agree_terms" value="1" {{ old('agree_terms') ? 'checked' : '' }}
                        required>
                    <label class="custom-control-label text-body-secondary" for="switch1">Saya setuju dengan
                        peraturan diatas</label><br>
                    @error('agree_terms')
                        <div class="invalid-feedback d-block">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <p></p>
            <div class="form-floating">
                <input type="email"
                    class="form-control bg-body-tertiary @error('recovery_email') is-invalid @enderror"
                    id="emailpemulih" name="recovery_email" placeholder="Email pemulihan akun"
                    value="{{ old('recovery_email') }}">
                <label for="emailpemulih" class="text-body-emphasis">Email pemulihan akun</label>
                @error('recovery_email')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <a class="text-body-secondary">
                <p><small><small>Isi email pemulihan dengan email lain, email pemulih digunakan untuk mengirim form
                            ketika lupa password</small></small></p>
            </a>
            <div class="form-check text-start my-3">
                <input class="form-check-input" type="checkbox" value="remember-me" id="flexCheckDefault">
                <label class="form-check-label text-body-secondary" for="flexCheckDefault">
                    Remember me
                </label>
            </div>
            <input class="btn btn-primary w-100 py-2" type="submit" value="Sign Up">
            <a class="text-body-secondary">
                <p><small>Sudah mempunyai akun?
            </a> <a href="{{ url('sub/login') }}">Login</a> <a class="text-body-secondary">untuk melanjutkan.</small>
                </p>
            </a>
            <p class="mt-5 mb-3 text-body-secondary">&copy; {{ date('Y') }} YussaTutoring.</p>
        </form>
    </main>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous">
    </script>

</body>

</html>
