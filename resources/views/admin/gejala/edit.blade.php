@extends('admin.layouts.admin')

@section('content')
    <h3>Edit Gejala</h3>
    <form action="{{ route('admin.gejala.update', $gejala->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Gejala Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $gejala->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $gejala->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Gejala</button>
    </form>
@endsection
