@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Judul Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Daftar Diagnosis</h3>
        <a href="{{ route('admin.diagnosis.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Diagnosis Baru
        </a>
    </div>

    <!-- Deskripsi Halaman -->
    <p class="text-muted">Berikut adalah daftar diagnosis yang tersedia dalam sistem. Anda dapat menambah, mengedit, atau menghapus data diagnosis.</p>

    <!-- Tabel Diagnosis -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 30%;">Nama Diagnosis</th>
                    <th style="width: 50%;">Deskripsi</th>
                    <th style="width: 15%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($diagnosis as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->name }}</td>
                        <td>{{ $item->description }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.diagnosis.edit', $item->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <!-- Tombol Delete -->
                                <form action="{{ route('admin.diagnosis.destroy', $item->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus diagnosis ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">Belum ada data diagnosis yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
