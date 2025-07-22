<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>HANGNAMA CAR - Signup</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/authstyle.css') }}">
</head>

<body class="auth-page">
    <div class="form-signin-wrapper">
        <main class="form-signin text-center">

            <a href="{{ url('/project1') }}">
                <img class="mb-4" src="{{ asset('images/Logo.gif') }}" alt="Logo" width="90px"
                    style="border-radius: 50%;">
            </a>

            <form action="{{ route('register.store') }}" method="POST">
                @csrf

                <h1 class="h3 mb-3 fw-normal">Please Sign Up</h1>

                @if ($errors->any())
                    <div class="alert alert-danger text-start small p-2">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <div class="form-floating mb-2">
                    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name"
                        name="name" placeholder="Full Name" value="{{ old('name') }}" required autofocus>
                    <label for="name">Full Name</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email"
                        name="email" placeholder="name@example.com" value="{{ old('email') }}" required>
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating mb-2">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password"
                        name="password" placeholder="Password" required>
                    <label for="password">Password</label>
                    <div class="form-text text-start text-secondary small">Password harus 8 karakter dan berisi simbol
                        (#, $, &).</div>
                </div>

                <div class="form-floating mb-2">
                    <input type="password" class="form-control" id="password_confirmation" name="password_confirmation"
                        placeholder="Confirm Password" required>
                    <label for="password_confirmation">Type your password again</label>
                </div>

                <div class="form-floating mb-2">
                    <select class="form-select @error('role') is-invalid @enderror" id="role" name="role"
                        required>
                        <option value="" disabled selected>Pilih Jenis Akun</option>
                        <option value="user" {{ old('role') == 'user' ? 'selected' : '' }}>User</option>
                        <option value="admin" {{ old('role') == 'admin' ? 'selected' : '' }}>Admin</option>
                    </select>
                    <label for="role">Jenis Akun</label>
                </div>

                <div class="form-floating mb-3">
                    <input type="email" class="form-control @error('recovery_email') is-invalid @enderror"
                        id="recovery_email" name="recovery_email" placeholder="Recovery Email"
                        value="{{ old('recovery_email') }}">
                    <label for="recovery_email">Email pemulihan akun</label>
                    <div class="form-text text-start text-secondary small">Opsional. Digunakan untuk lupa password.
                    </div>
                </div>

                <div class="form-check text-start my-3">
                    <input class="form-check-input @error('agree_terms') is-invalid @enderror" type="checkbox"
                        value="1" id="agree_terms" name="agree_terms" required
                        {{ old('agree_terms') ? 'checked' : '' }}>
                    <label class="form-check-label" for="agree_terms">
                        Saya setuju dengan <a href="#" class="auth-links">peraturan</a> yang berlaku.
                    </label>
                </div>

                <button class="btn btn-dark w-100 py-2" type="submit">Sign Up</button>

                <div class="auth-links text-center mt-3">
                    Sudah mempunyai akun? <a href="{{ route('login') }}">Login</a>
                </div>

                <p class="mt-4 mb-3 text-body-secondary">&copy; {{ date('Y') }} YussaTutoring.</p>
            </form>
        </main>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
