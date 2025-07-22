<!doctype html>
<html lang="en" data-bs-theme="auto">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Mark Otto, Jacob Thornton, and Bootstrap contributors">
    <meta name="generator" content="Hugo 0.118.2">
    <title>HANGNAMA CAR - Login</title>

    <link rel="canonical" href="https://getbootstrap.com/docs/5.3/examples/sign-in/">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@docsearch/css@3">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="{{ asset('css/authstyle.css') }}">
</head>

<body class="auth-page">

    <div class="form-signin-wrapper">
        <main class="form-signin text-center">

            <a href="{{ url('/project1') }}">
                <img class="mb-4" src="{{ asset('images/Logo.gif') }}" alt="Logo" width="90px"
                    style="border-radius: 50%;">
            </a>

            <h1 class="h3 mb-3 fw-normal">Login to Your Account</h1>

            @if ($errors->any())
                <div class="alert alert-danger text-start small p-2">
                    <ul class="mb-0">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('login.attempt') }}" method="POST">
                @csrf

                <div class="form-floating mb-2">
                    <input type="email" class="form-control" id="email" name="email"
                        placeholder="name@example.com" value="{{ old('email') }}" required autofocus>
                    <label for="email">Email address</label>
                </div>

                <div class="form-floating">
                    <input type="password" class="form-control" id="password" name="password" placeholder="Password"
                        required>
                    <label for="password">Password</label>
                </div>

                <div class="d-flex justify-content-between align-items-center my-3">
                    <div class="form-check text-start">
                        <input class="form-check-input" type="checkbox" id="remember" name="remember">
                        <label class="form-check-label" for="remember">
                            Remember me
                        </label>
                    </div>
                    <a href="#" class="auth-links small">Forgot password?</a>
                </div>

                <button class="btn btn-dark w-100 py-2" type="submit">Login</button>

                <div class="auth-links text-center">
                    Don't have an account? <a href="{{ route('register') }}">Sign up</a>
                </div>

                <p class="mt-4 mb-3 text-body-secondary">&copy; {{ date('Y') }} HANGNAMA CAR</p>
            </form>
        </main>
    </div>

    <script>
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Success!',
                text: '{{ session('success') }}',
                background: 'var(--bg-card)',
                color: 'var(--text-primary)',
                timer: 3000,
                showConfirmButton: false
            });
        @endif
    </script>
</body>

</html>
