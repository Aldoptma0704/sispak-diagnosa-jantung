<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
        }
        .sidebar {
            height: 100vh;
            background-color: #ffffff;
            border-right: 1px solid #dee2e6;
        }
        .sidebar a {
            text-decoration: none;
            color: #333;
            display: block;
            padding: 10px;
            border-radius: 5px;
        }
        .sidebar a:hover, .sidebar a.active {
            background-color: #e2e6ea;
            font-weight: bold;
        }
        .card-stat {
            border-radius: 15px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .header {
            background-color: #5a67d8;
            color: white;
        }
    </style>
</head>
<body>
    <!-- Main Layout -->
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar p-3">
            <h4 class="mb-4 text-primary">Admin Dashboard</h4>
            <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
            <a href="{{ route('admin.gejala.index') }}">Kelola Gejala</a>
            <a href="{{ route('admin.diagnosis.index') }}">Kelola Diagnosis</a>
            <a href="{{ route('admin.rules.index') }}">Kelola Rule</a>
            <a href="{{ route('admin.solusi.index') }}">Kelola Solusi</a> 
            <form action="{{ route('logout') }}" method="POST" class="mt-3">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <div class="header p-3 mb-4 d-flex justify-content-between align-items-center">
                <h5 class="m-0">Dashboard</h5>
                <div>
                    <span>👤 {{ Session::get('user')['name'] ?? 'Admin' }}</span>
                </div>
            </div>

            <!-- Content Section -->
            <div class="container">
                @yield('content') 
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
