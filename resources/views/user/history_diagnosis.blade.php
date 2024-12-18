@extends('user.layouts.app')

@section('content')
<div class="container mt-5">
    <!-- Judul Halaman -->
    <div class="text-center mb-5">
        <h2 class="fw-bold text-primary">History Diagnosis Anda</h2>
        <p class="text-muted">Berikut adalah riwayat hasil diagnosis Anda yang telah disimpan.</p>
    </div>

    <!-- Tabel History -->
    @if ($history->isEmpty())
        <div class="alert alert-info text-center">
            <i class="bi bi-info-circle"></i> Belum ada history diagnosis.
        </div>
    @else
        <div class="table-responsive">
            <table class="table table-hover table-striped align-middle shadow-sm">
                <thead class="table-primary text-center">
                    <tr>
                        <th>No</th>
                        <th>Diagnosis</th>
                        <th>Solusi</th>
                        <th>Keyakinan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($history as $index => $item)
                        <tr>
                            <td class="text-center">{{ $index + 1 }}</td>
                            <td>{{ $item->diagnosis }}</td>
                            <td>{{ !empty($item->solusi) ? $item->solusi : 'Tidak ada solusi tersedia' }}</td>
                            <td>{{ is_numeric($item->confidence) ? $item->confidence . '%' : 'N/A' }}</td>
                            <td class="text-center">
                                <form action="{{ route('user.history.delete', $item->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    @endif

    <!-- Tombol Kembali -->
    <div class="text-center mt-4">
        <a href="{{ route('user.gejala') }}" class="btn btn-outline-primary btn-lg">
            <i class="bi bi-arrow-left"></i> Kembali ke Gejala
        </a>
    </div>
</div>
@endsection
