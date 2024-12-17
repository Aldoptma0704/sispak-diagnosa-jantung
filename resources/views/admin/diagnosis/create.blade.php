@extends('admin.layouts.admin')

@section('content')
    <h3>Add New Diagnosis</h3>
    <form action="{{ route('admin.diagnosis.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Diagnosis Name</label>
            <input type="text" name="name" id="name" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea name="description" id="description" class="form-control" rows="4"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Diagnosis</button>
    </form>
@endsection
