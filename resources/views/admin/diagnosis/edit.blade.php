@extends('admin.layouts.admin')

@section('content')
    <h3>Edit Diagnosis</h3>
    <form action="{{ route('admin.diagnosis.update', $diagnosis->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="name" class="form-label">Diagnosis Name</label>
            <input type="text" name="name" id="name" class="form-control" value="{{ $diagnosis->name }}" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4">{{ $diagnosis->description }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Diagnosis</button>
    </form>
@endsection
