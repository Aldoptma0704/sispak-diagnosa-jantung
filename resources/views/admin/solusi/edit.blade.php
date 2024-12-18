@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <h3 class="fw-bold text-primary mb-4">Edit Solusi</h3>

    <!-- Form Edit Solusi -->
    <div class="card shadow-sm border-0">
        <div class="card-body">
            <form action="{{ route('admin.solusi.update', $solusi->id) }}" method="POST">
                @csrf
                @method('PUT')

                <!-- Input Diagnosis -->
                <div class="mb-4">
                    <label for="diagnosis_id" class="form-label fw-semibold">Diagnosis</label>
                    <select name="diagnosis_id" id="diagnosis_id" class="form-select" required>
                        <option value="" disabled>Pilih Diagnosis</option>
                        @foreach ($diagnosis as $item)
                            <option value="{{ $item->id }}" {{ $solusi->diagnosis_id == $item->id ? 'selected' : '' }}>
                                {{ $item->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <!-- Input Solusi -->
                <div class="mb-4">
                    <label for="solusi" class="form-label fw-semibold">Solusi</label>
                    <textarea 
                        name="solusi" 
                        id="solusi" 
                        class="form-control" 
                        rows="4" 
                        required
                    >{{ old('solusi', $solusi->solusi) }}</textarea>
                </div>

                <!-- Tombol Aksi -->
                <div class="d-flex justify-content-end">
                    <a href="{{ route('admin.solusi.index') }}" class="btn btn-outline-secondary me-3">
                        <i class="bi bi-arrow-left"></i> Kembali
                    </a>
                    <button type="submit" class="btn btn-primary">
                        <i class="bi bi-save"></i> Perbarui Solusi
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
