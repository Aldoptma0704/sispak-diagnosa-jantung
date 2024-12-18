@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Judul Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Edit Gejala</h3>
    </div>

    <!-- Deskripsi Halaman -->
    <p class="text-muted">Silakan perbarui informasi gejala menggunakan formulir di bawah ini. Pastikan data yang dimasukkan benar dan lengkap.</p>

    <!-- Form Edit Gejala -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.gejala.update', $gejala->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Nama Gejala -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Nama Gejala <span class="text-danger">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $gejala->name) }}" 
                        placeholder="Masukkan nama gejala" 
                        required
                    >
                    @error('name')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Input Deskripsi -->
                <div class="mb-4">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea 
                        name="description" 
                        id="description" 
                        class="form-control @error('description') is-invalid @enderror" 
                        rows="4" 
                        placeholder="Masukkan deskripsi gejala (opsional)"
                    >{{ old('description', $gejala->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.gejala.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Perbarui Gejala
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
