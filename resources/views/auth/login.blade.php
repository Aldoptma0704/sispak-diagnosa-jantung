<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login | Cek Jantung Yuk!</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome (Untuk Ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to right, #eef2f7, #ffffff);
            height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .container {
            flex: 1;
        }

        .card {
            border: none;
            border-radius: 10px;
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .card-title {
            font-size: 1.8rem;
            font-weight: bold;
            color: #0d6efd;
        }

        .input-group-text {
            background-color: #0d6efd;
            color: #ffffff;
            border: none;
        }

        .form-control:focus {
            box-shadow: 0 0 5px rgba(13, 110, 253, 0.5);
            border-color: #0d6efd;
        }

        .btn-primary {
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        footer {
            text-align: center;
            padding: 1rem 0;
            background: #f8f9fa;
            color: #6c757d;
        }

        footer a {
            color: #0d6efd;
            text-decoration: none;
        }

        footer a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="#"><i class="fas fa-heartbeat"></i> Cek Jantung Yuk!</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-secondary mx-3">Home</a></li>
                    <li class="nav-item"><a href="{{ url('register') }}" class="btn btn-outline-primary mx-2">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Login Form -->
    <div class="container d-flex justify-content-center align-items-center">
        <div class="col-md-6">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h2 class="card-title">Login</h2>
                    <p class="text-muted">Masukkan email dan password Anda</p>
                </div>

                <!-- Error Message -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Login Form -->
                <form action="{{ route('login') }}" method="POST">
                    @csrf

                    <!-- Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email Anda" required>
                        </div>
                    </div>

                    <!-- Password -->
                    <div class="mb-4">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Masukkan password Anda" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid mb-3">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </form>

                <!-- Register Link -->
                <div class="text-center">
                    <p class="mb-0">Belum punya akun? <a href="{{ url('register') }}" class="text-primary fw-semibold">Daftar di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Cek Jantung Yuk! | <a href="#">Kebijakan Privasi</a></p>
        </div>
    </footer>
</body>
</html>
