<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cek Jantung Yuk!</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .navbar {
            padding: 1rem 2rem;
        }
        .hero-section h1 {
            font-size: 2.5rem;
            font-weight: 700;
        }
        .hero-section p {
            font-size: 1.125rem;
        }
        .hero-section .btn {
            margin-top: 1.5rem;
            padding: 0.75rem 1.5rem;
            font-size: 1rem;
        }
        .card {
            transition: transform 0.3s ease, box-shadow 0.3s ease;
        }
        .section-title {
            font-size: 2rem;
            font-weight: 600;
            margin-bottom: 2rem;
        }
        .card img {
            max-height: 500px;
            object-fit: cover;
        }
        .section {
            padding: 4rem 2rem;
        }
    </style>
</head>
<body class="bg-light">

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-white shadow-sm">
        <div class="container-fluid">
            <a class="navbar-brand text-primary font-weight-bold" href="#"><b>Cek Jantung Yuk!</b></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-secondary mx-3">Home</a></li>
                    <li class="nav-item"><a href="#alur-kerja" class="nav-link text-secondary mx-3">Alur Kerja</a></li>
                    <li class="nav-item"><a href="{{ url('login') }}" class="btn btn-primary text-white mx-2">Log In</a></li>
                    <li class="nav-item"><a href="{{ url('register') }}" class="btn btn-outline-primary mx-2">Register</a></li>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Hero Section -->
    <div class="container hero-section d-flex flex-column flex-lg-row justify-content-between align-items-center py-5 px-3">
        <!-- Left Section -->
        <div class="col-lg-6 text-center text-lg-start mb-4">
            <h1 class="display-4 text-dark">Cek Jantung Yuk!</h1>
            <p class="text-secondary lead">
                <span class="text-primary">Cek Jantung Yuk!</span> adalah sistem informasi berbasis <span class="text-primary">web</span>
                yang memanfaatkan teknologi untuk membantu Anda mengenali penyakit jantung berdasarkan gejala yang dialami.
            </p>
            <a href="#" class="btn btn-primary shadow-sm">Ayo Mulai!</a>
        </div>

        <!-- Right Section -->
        <div class="col-lg-5 text-center">
            <img src="{{ asset('images/dokter 1.png') }}" alt="Cek Jantung" class="img-fluid">
        </div>
    </div>

    <!-- Alur Kerja Section -->
    <section id="alur-kerja" class="section bg-white">
        <div class="container">
            <!-- Section Title -->
            <h2 class="section-title text-center text-gray-800">Alur Kerja Sistem Pakar</h2>
            
            <!-- Cards Row -->
            <div class="row justify-content-center">
                <!-- Card 1 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow rounded-lg text-center">
                        <img src="{{ asset('images/Login.png') }}" alt="Login" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Login</h5>
                            <p class="card-text text-secondary">
                                Masuk ke akun Anda atau lakukan registrasi untuk melanjutkan ke tahap berikutnya.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Card 2 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow rounded-lg text-center">
                        <img src="{{ asset('images/Gejala.jpg') }}" alt="Test Gejala" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Test Gejala Pasien</h5>
                            <p class="card-text text-secondary">
                                Jawab pertanyaan terkait gejala yang dialami untuk membantu proses analisis.
                            </p>
                        </div>
                    </div>
                </div>
                
                <!-- Card 3 -->
                <div class="col-md-4 mb-4">
                    <div class="card shadow rounded-lg text-center">
                        <img src="{{ asset('images/solusi.png') }}" alt="Hasil dan Solusi" class="card-img-top">
                        <div class="card-body">
                            <h5 class="card-title text-dark">Hasil dan Solusi</h5>
                            <p class="card-text text-secondary">
                                Lihat hasil analisis dan dapatkan rekomendasi solusi yang sesuai.
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

</body>
</html>
