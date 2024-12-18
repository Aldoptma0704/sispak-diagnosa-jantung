@extends('user.layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-4">
        <h2 class="fw-bold text-primary">Pilih Gejala yang Anda Alami</h2>
        <p class="text-muted lead">Centang gejala yang Anda rasakan untuk mendapatkan hasil diagnosis.</p>
    </div>

    <!-- Pesan Error -->
    @if ($errors->any())
        <div class="alert alert-danger text-center">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Form Pilih Gejala -->
    <form action="{{ route('user.diagnosis') }}" method="POST">
        @csrf
        <div class="row g-4">
            @foreach ($gejala as $g)
                <div class="col-md-4 col-sm-6">
                    <div class="card shadow-sm h-100 border-0 hover-effect">
                        <div class="card-body text-center">
                            <input type="checkbox" class="form-check-input mb-3" name="gejala_id[]" value="{{ $g->id }}" id="gejala{{ $g->id }}">
                            <label for="gejala{{ $g->id }}" class="form-check-label fw-semibold">
                                {{ $g->name }}
                            </label>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>

        <!-- Tombol Submit dan Kembali -->
        <div class="text-center mt-5">
            <a href="{{ route('user.dashboard') }}" class="btn btn-outline-secondary btn-lg me-3">
                <i class="bi bi-arrow-left"></i> Kembali
            </a>
            <button type="submit" class="btn btn-primary btn-lg px-5">
                <i class="bi bi-heart-pulse"></i> Cek Diagnosis
            </button>
        </div>
    </form>
</div>


<style>
    .alert-danger {
        font-size: 1rem;
        font-weight: 500;
    }
</style>
@endsection
