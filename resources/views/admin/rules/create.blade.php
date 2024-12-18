@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Judul Halaman -->
    <h3 class="fw-bold text-primary mb-4">Buat Rule Baru</h3>

    <!-- Deskripsi Halaman -->
    <p class="text-muted">Gunakan formulir di bawah untuk membuat rule baru berdasarkan gejala dan diagnosis. Pastikan semua data telah diisi dengan benar.</p>

    <!-- Form Tambah Rule -->
    <div class="card shadow-sm">
        <div class="card-body">
            <form action="{{ route('admin.rules.store') }}" method="POST">
                @csrf

                <!-- Input Gejala -->
                <div class="mb-4">
                    <label for="gejala_id" class="form-label fw-semibold">Gejala</label>
                    <div class="form-check">
                        @foreach ($gejala as $item)
                            <div class="form-check mb-2">
                                <input type="checkbox" name="gejala_id[]" class="form-check-input" value="{{ $item->id }}" id="gejala_{{ $item->id }}">
                                <label class="form-check-label" for="gejala_{{ $item->id }}">{{ $item->name }}</label>
                            </div>
                        @endforeach
                    </div>
                </div>

                <!-- Input Diagnosis -->
                <div class="mb-4">
                    <label for="diagnosis_id" class="form-label fw-semibold">Diagnosis</label>
                    <select name="diagnosis_id" id="diagnosis_id" class="form-select" required>
                        <option value="" disabled selected>Pilih Diagnosis</option>
                        @foreach ($diagnosis as $item)
                            <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.rules.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Simpan Rule
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
