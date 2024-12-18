<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Jantung Yuk!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }

        /* Navbar */
        .navbar {
            background: #ffffff;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        .navbar-brand {
            font-weight: bold;
            font-size: 1.6rem;
            color: #0d6efd !important;
        }

        .navbar-nav .nav-link {
            font-weight: 500;
            color: #6c757d !important;
            transition: color 0.3s ease;
        }

        .navbar-nav .nav-link:hover {
            color: #0d6efd !important;
        }

        /* Hero Section */
        .hero-section {
            background: linear-gradient(to right, #eef2f7, #ffffff);
            padding: 5rem 0;
        }

        .hero-section h1 {
            font-size: 3.2rem;
            font-weight: 700;
            color: #343a40;
        }

        .hero-section p {
            font-size: 1.2rem;
            color: #6c757d;
            line-height: 1.8;
        }

        .btn-cta {
            font-size: 1.2rem;
            padding: 0.75rem 2rem;
            transition: all 0.3s ease;
        }

        .btn-cta:hover {
            background-color: #0b5ed7;
            transform: translateY(-3px);
        }

        /* Card Hover Effect */
        .card {
            transition: all 0.3s ease-in-out;
            border: none;
            border-radius: 10px;
            overflow: hidden;
        }

        .card:hover {
            transform: translateY(-10px);
            box-shadow: 0 10px 20px rgba(0, 0, 0, 0.2);
        }

        /* Section Title */
        .section-title {
            font-size: 2.2rem;
            font-weight: bold;
            color: #343a40;
        }

        /* Footer */
        footer {
            background: #f8f9fa;
            padding: 1.5rem 0;
            color: #6c757d;
            text-align: center;
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
            <a class="navbar-brand" href="#">
                <i class="bi bi-heart-pulse"></i> Cek Jantung Yuk!
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="#" class="nav-link">Home</a></li>
                    <li class="nav-item"><a href="#alur-kerja" class="nav-link">Alur Kerja</a></li>
                    <li class="nav-item"><a href="{{ url('login') }}" class="btn btn-primary text-white mx-2">Log In</a></li>
                    <li class="nav-item"><a href="{{ url('register') }}" class="btn btn-outline-primary mx-2">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="hero-section">
        <div class="container d-flex flex-column flex-lg-row align-items-center justify-content-between">
            <!-- Left Section -->
            <div class="col-lg-6 mb-4 mb-lg-0 text-center text-lg-start">
                <h1>Cek Kesehatan Jantung Anda Sekarang!</h1>
                <p>
                    Dapatkan hasil analisis yang cepat dan akurat dengan sistem berbasis 
                    <span class="fw-bold text-primary">web</span> ini. Kenali gejala dan solusi untuk menjaga kesehatan jantung Anda.
                </p>
                <a href="{{ url('login') }}" class="btn btn-primary btn-cta shadow-sm">Mulai Sekarang</a>
            </div>

            <!-- Right Section -->
            <div class="col-lg-5 text-center">
                <img src="{{ asset('images/dokter 1.png') }}" alt="Dokter" class="img-fluid rounded">
            </div>
        </div>
    </div>

    <!-- Alur Kerja Section -->
    <section id="alur-kerja" class="py-5">
        <div class="container">
            <h2 class="section-title text-center mb-4">Alur Kerja Sistem</h2>
            <div class="row g-4">
                <!-- Card 1 -->
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <img src="{{ asset('images/Login.png') }}" class="card-img-top" alt="Login">
                        <div class="card-body">
                            <h5 class="card-title">Login atau Register</h5>
                            <p class="card-text">Buat akun atau login untuk memulai diagnosis gejala jantung Anda.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <img src="{{ asset('images/Gejala.jpg') }}" class="card-img-top" alt="Gejala">
                        <div class="card-body">
                            <h5 class="card-title">Pilih Gejala</h5>
                            <p class="card-text">Centang gejala yang Anda rasakan untuk membantu proses diagnosis.</p>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-4">
                    <div class="card text-center shadow-sm">
                        <img src="{{ asset('images/solusi.png') }}" class="card-img-top" alt="Solusi">
                        <div class="card-body">
                            <h5 class="card-title">Hasil Diagnosis</h5>
                            <p class="card-text">Dapatkan hasil diagnosis lengkap dengan rekomendasi solusi terbaik.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <p>&copy; 2024 Cek Jantung Yuk! | All Rights Reserved | <a href="#">Kebijakan Privasi</a></p>
        </div>
    </footer>

</body>
</html>
