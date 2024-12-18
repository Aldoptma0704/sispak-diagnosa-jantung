<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register | Cek Jantung Yuk!</title>
    
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Font Awesome (Untuk Ikon) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

    <style>
        body {
            font-family: 'Arial', sans-serif;
            background: linear-gradient(to bottom right, #f8f9fa, #ffffff);
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        .navbar {
            background-color: #ffffff;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }

        .card {
            border: none;
            border-radius: 12px;
            box-shadow: 0 8px 15px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
            margin-bottom: 40px
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
            border-color: #0d6efd;
            box-shadow: 0 0 6px rgba(13, 110, 253, 0.5);
        }

        .btn-primary {
            font-size: 1.1rem;
            font-weight: 500;
            transition: all 0.3s ease;
        }

        .btn-primary:hover {
            background-color: #0b5ed7;
            transform: translateY(-2px);
        }

        footer {
            background-color: #ffffff;
            box-shadow: 0 -2px 6px rgba(0, 0, 0, 0.1);
            padding: 1rem 0;
            text-align: center;
            color: #6c757d;
            margin-top: auto;
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
    <nav class="navbar navbar-expand-lg fixed-top">
        <div class="container">
            <a class="navbar-brand text-primary fw-bold" href="#">
                <i class="fas fa-heartbeat"></i> Cek Jantung Yuk!
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-secondary mx-2">Home</a></li>
                    <li class="nav-item"><a href="{{ url('login') }}" class="btn btn-outline-primary mx-2">Log In</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Register Form -->
    <div class="container d-flex justify-content-center align-items-center mt-5 pt-5">
        <div class="col-md-6 col-lg-5">
            <div class="card p-4">
                <div class="text-center mb-4">
                    <h2 class="card-title">Daftar Akun Baru</h2>
                    <p class="text-muted">Silakan isi formulir di bawah untuk membuat akun Anda.</p>
                </div>

                <!-- Error Alert -->
                @if($errors->any())
                    <div class="alert alert-danger">
                        <ul class="mb-0">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <!-- Form Register -->
                <form action="{{ route('register') }}" method="POST">
                    @csrf

                    <!-- Input Name -->
                    <div class="mb-3">
                        <label for="name" class="form-label">Nama</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                            <input type="text" class="form-control" id="name" name="name" placeholder="Nama Anda" required>
                        </div>
                    </div>

                    <!-- Input Email -->
                    <div class="mb-3">
                        <label for="email" class="form-label">Email</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-envelope"></i></span>
                            <input type="email" class="form-control" id="email" name="email" placeholder="Email Anda" required>
                        </div>
                    </div>

                    <!-- Input Password -->
                    <div class="mb-3">
                        <label for="password" class="form-label">Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password" name="password" placeholder="Password" required>
                        </div>
                    </div>

                    <!-- Confirm Password -->
                    <div class="mb-4">
                        <label for="password_confirmation" class="form-label">Konfirmasi Password</label>
                        <div class="input-group">
                            <span class="input-group-text"><i class="fas fa-lock"></i></span>
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" placeholder="Ulangi Password" required>
                        </div>
                    </div>

                    <!-- Submit Button -->
                    <div class="d-grid">
                        <button type="submit" class="btn btn-primary">Daftar</button>
                    </div>
                </form>

                <!-- Link ke Login -->
                <div class="text-center mt-3">
                    <p>Sudah punya akun? <a href="{{ url('login') }}" class="text-primary fw-semibold">Login di sini</a></p>
                </div>
            </div>
        </div>
    </div>

    <!-- Footer -->
    <footer>
        <p>&copy; 2024 Cek Jantung Yuk! | <a href="#">Kebijakan Privasi</a></p>
    </footer>

</body>
</html>
