@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Judul Halaman -->
    <h3 class="fw-bold text-primary mb-4">Tambah Solusi Baru</h3>

    <!-- Deskripsi Halaman -->
    <p class="text-muted">Gunakan formulir di bawah untuk menambahkan solusi baru yang sesuai dengan diagnosis. Pastikan semua data telah diisi dengan benar.</p>

    <!-- Form Tambah Solusi -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.solusi.store') }}" method="POST">
                @csrf

                <!-- Input Diagnosis -->
                <div class="mb-4">
                    <label for="diagnosis_id" class="form-label fw-semibold">Diagnosis <span class="text-danger">*</span></label>
                    <select name="diagnosis_id" id="diagnosis_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Diagnosis</option>
                        @foreach ($diagnosis as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Solusi -->
                <div class="mb-4">
                    <label for="solusi" class="form-label fw-semibold">Solusi <span class="text-danger">*</span></label>
                    <textarea name="solusi" id="solusi" class="form-control" rows="4" placeholder="Masukkan solusi untuk diagnosis ini" required></textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.solusi.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Solusi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
