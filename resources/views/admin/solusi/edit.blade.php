@extends('layouts.admin')

@section('content')
    <h3>Edit Solution</h3>
    <form action="{{ route('admin.solusi.update', $solution->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="diagnosis_id" class="form-label">Diagnosis</label>
            <select name="diagnosis_id" id="diagnosis_id" class="form-control" required>
                @foreach ($diagnoses as $item)
                    <option value="{{ $item->id }}" {{ $solution->diagnosis_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="solution" class="form-label">Solution</label>
            <textarea name="solution" id="solution" class="form-control" rows="4" required>{{ $solution->solution }}</textarea>
        </div>
        <button type="submit" class="btn btn-primary">Update Solution</button>
    </form>
@endsection
