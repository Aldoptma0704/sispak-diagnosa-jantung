@extends('admin.layouts.admin')

@section('content')
<div class="container mt-4">
    <!-- Judul Halaman -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h3 class="fw-bold text-primary">Daftar Rules</h3>
        <a href="{{ route('admin.rules.create') }}" class="btn btn-primary">
            <i class="bi bi-plus-circle"></i> Tambah Rule Baru
        </a>
    </div>

    <!-- Deskripsi Halaman -->
    <p class="text-muted">Berikut adalah daftar rules yang terdaftar dalam sistem. Anda dapat menambah, mengedit, atau menghapus data rules sesuai kebutuhan.</p>

    <!-- Tabel Rules -->
    <div class="table-responsive">
        <table class="table table-hover table-bordered align-middle text-center">
            <thead class="table-primary">
                <tr>
                    <th style="width: 5%;">#</th>
                    <th style="width: 40%;">Gejala</th>
                    <th style="width: 35%;">Diagnosis</th>
                    <th style="width: 20%;">Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($rules as $rule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="text-start">
                            @foreach ($rule->gejala as $gejala)
                                <span class="badge bg-info text-dark mb-1">{{ $gejala->name }}</span><br>
                            @endforeach
                        </td>
                        <td>{{ $rule->diagnosis->name }}</td>
                        <td>
                            <div class="d-flex justify-content-center gap-2">
                                <!-- Tombol Edit -->
                                <a href="{{ route('admin.rules.edit', $rule->id) }}" class="btn btn-warning btn-sm">
                                    <i class="bi bi-pencil-square"></i> Edit
                                </a>
                                <!-- Tombol Delete -->
                                <form action="{{ route('admin.rules.destroy', $rule->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus rule ini?')">
                                        <i class="bi bi-trash"></i> Hapus
                                    </button>
                                </form>
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="4" class="text-muted">Belum ada data rules yang tersedia.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
