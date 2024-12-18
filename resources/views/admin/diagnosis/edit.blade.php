@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Judul Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Edit Diagnosis</h3>
    </div>

    <!-- Deskripsi Halaman -->
    <p class="text-muted">Silakan perbarui informasi diagnosis menggunakan formulir di bawah ini. Pastikan data yang dimasukkan benar dan lengkap.</p>

    <!-- Form Edit Diagnosis -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.diagnosis.update', $diagnosis->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Nama Diagnosis -->
                <div class="mb-4">
                    <label for="name" class="form-label fw-semibold">Nama Diagnosis <span class="text-danger">*</span></label>
                    <input 
                        type="text" 
                        name="name" 
                        id="name" 
                        class="form-control @error('name') is-invalid @enderror" 
                        value="{{ old('name', $diagnosis->name) }}" 
                        placeholder="Masukkan nama diagnosis" 
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
                        placeholder="Masukkan deskripsi diagnosis (opsional)"
                    >{{ old('description', $diagnosis->description) }}</textarea>
                    @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.diagnosis.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Perbarui Diagnosis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
