@extends('user.layouts.app')

@section('content')
<!-- Hero Section -->
<div class="container-fluid bg-light py-5">
    <div class="container hero-section d-flex flex-column flex-lg-row justify-content-between align-items-center py-5 px-3">
        <!-- Left Section -->
        <div class="col-lg-6 text-center text-lg-start mb-4">
            <h1 class="display-3 fw-bold text-primary mb-3">Cek Jantung Yuk!</h1>
            <p class="text-secondary lead mb-4">
                <span class="fw-bold text-primary">Konsultasikan Gejala Anda!</span> Sistem diagnosis modern ini membantu Anda memahami 
                <span class="text-primary fw-bold">kesehatan jantung</span> berdasarkan gejala yang Anda alami.
            </p>
            <a href="{{ url('user/gejala') }}" class="btn btn-primary btn-lg shadow-lg px-5 py-3 rounded-pill">
                <i class="bi bi-heart-pulse"></i> Ayo Mulai!
            </a>
        </div>

        <!-- Right Section -->
        <div class="col-lg-5 text-center">
            <div class="position-relative">
                <!-- Shadowed Card -->
                <div class="card shadow-lg border-0 rounded-4 overflow-hidden">
                    <img src="{{ asset('images/dokter 1.png') }}" alt="Cek Jantung" class="img-fluid p-3">
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
