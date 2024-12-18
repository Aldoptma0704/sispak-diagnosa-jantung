@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Judul Halaman -->
    <h3 class="fw-bold text-primary mb-4">Tambah Diagnosis Baru</h3>

    <!-- Deskripsi Halaman -->
    <p class="text-muted">Gunakan formulir di bawah ini untuk menambahkan diagnosis baru ke dalam sistem. Pastikan data yang dimasukkan sudah benar.</p>

    <!-- Form Tambah Diagnosis -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.diagnosis.store') }}" method="POST">
                @csrf

                <!-- Input Nama Diagnosis -->
                <div class="mb-3">
                    <label for="name" class="form-label fw-semibold">Nama Diagnosis <span class="text-danger">*</span></label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Masukkan nama diagnosis" required>
                </div>

                <!-- Input Deskripsi -->
                <div class="mb-3">
                    <label for="description" class="form-label fw-semibold">Deskripsi</label>
                    <textarea name="description" id="description" class="form-control" rows="4" placeholder="Masukkan deskripsi diagnosis (opsional)"></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.diagnosis.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Diagnosis
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
