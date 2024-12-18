@extends('user.layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <h2 class="text-center mb-4">Hasil Diagnosis Anda</h2>

    <!-- Cek Jika Diagnosis Tersedia -->
    @if (!empty($results) && count($results) > 0)
        @php
            $result = $results[0]; // Ambil hanya hasil pertama
        @endphp
        <!-- Kartu Hasil Diagnosis -->
        <div class="card mb-3 shadow-sm">
            <div class="card-header bg-primary text-white">
                <h5 class="mb-0">Diagnosis Penyakit</h5>
            </div>
            <div class="card-body">
                <p><strong>Nama Penyakit:</strong> 
                    {{ isset($result['diagnosis']->name) ? $result['diagnosis']->name : $result['diagnosis'] }}
                </p>
                <p><strong>Solusi:</strong>
                    @if ($result['diagnosis'] && $result['diagnosis']->solusi->isNotEmpty())
                        {{ $result['diagnosis']->solusi->first()->solusi }}
                    @else
                        Tidak ada solusi tersedia
                    @endif
                </p>
                <p><strong>Keyakinan:</strong> {{ $result['confidence'] }}%</p>
            </div>
        </div>
    @else
        <!-- Jika Tidak Ada Hasil Diagnosis -->
        <div class="alert alert-warning text-center">
            <p>Maaf, tidak ada diagnosis yang sesuai dengan gejala yang Anda pilih.</p>
        </div>
    @endif

    <!-- Tombol Kembali -->
    <div class="text-center mt-4">
        <a href="{{ route('user.gejala') }}" class="btn btn-secondary btn-lg">Kembali</a>
    </div>
</div>
@endsection
