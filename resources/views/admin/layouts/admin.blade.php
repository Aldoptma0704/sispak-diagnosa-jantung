<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <style>
        body {
            font-family: 'Arial', sans-serif;
            background-color: #f4f5f7;
        }

        /* Sidebar Styling */
        .sidebar {
            height: 100vh;
            width: 250px;
            position: fixed;
            top: 0;
            left: 0;
            background-color: #ffffff;
            border-right: 1px solid #e0e0e0;
            box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
            z-index: 1030;
        }

        .sidebar h4 {
            font-size: 1.5rem;
            font-weight: bold;
            color: #0d6efd;
            padding: 15px 20px;
            border-bottom: 1px solid #e0e0e0;
        }

        .sidebar a {
            text-decoration: none;
            color: #495057;
            padding: 12px 20px;
            display: block;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .sidebar a.active, .sidebar a:hover {
            background-color: #e9ecef;
            color: #0d6efd;
            font-weight: bold;
            border-left: 4px solid #0d6efd;
        }

        .sidebar button {
            width: 90%;
            margin: 15px auto;
        }

        /* Header Styling */
        .header {
            position: sticky;
            top: 0;
            margin-left: 250px;
            background-color: #0d6efd;
            color: white;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            z-index: 1020;
        }

        .header h5 {
            margin: 0;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .header .user-info {
            font-size: 1rem;
            font-weight: 500;
        }

        /* Content Styling */
        .content {
            margin-left: 250px;
            padding: 20px;
        }

        .card-stat {
            border-radius: 12px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            transition: all 0.3s ease-in-out;
        }

        .card-stat:hover {
            transform: translateY(-3px);
            box-shadow: 0 8px 12px rgba(0, 0, 0, 0.2);
        }

        /* Responsive Design */
        @media (max-width: 768px) {
            .sidebar {
                width: 100%;
                height: auto;
                border-right: none;
            }

            .header {
                margin-left: 0;
            }

            .content {
                margin-left: 0;
            }
        }
    </style>
</head>
<body>

    <!-- Main Layout -->
    <div class="d-flex">
        <!-- Sidebar -->
        <div class="sidebar">
            <h4>Admin Dashboard</h4>
            <a href="{{ route('admin.dashboard') }}" class="active">Dashboard</a>
            <a href="{{ route('admin.gejala.index') }}">Kelola Gejala</a>
            <a href="{{ route('admin.diagnosis.index') }}">Kelola Diagnosis</a>
            <a href="{{ route('admin.rules.index') }}">Kelola Rule</a>
            <a href="{{ route('admin.solusi.index') }}">Kelola Solusi</a> 
            <form action="{{ route('logout') }}" method="POST">
                @csrf
                <button type="submit" class="btn btn-danger">Logout</button>
            </form>
        </div>

        <!-- Content -->
        <div class="flex-grow-1">
            <!-- Header -->
            <div class="header">
                <h5>Dashboard</h5>
                <div class="user-info">
                    👤 {{ Session::get('user')['name'] ?? 'Admin' }}
                </div>
            </div>

            <!-- Content Section -->
            <div class="content">
                @yield('content') 
            </div>
        </div>
    </div>

    <!-- Bootstrap 5 JS Bundle -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
