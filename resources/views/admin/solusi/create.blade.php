@extends('admin.layouts.admin')

@section('content')
    <h3>Add New Solution</h3>
    <form action="{{ route('admin.solusi.store') }}" method="POST">
        @csrf
        <div class="mb-3">
            <label for="diagnosis_id" class="form-label">Diagnosis</label>
            <select name="diagnosis_id" id="diagnosis_id" class="form-control" required>
                @foreach ($diagnosis as $item)
                    <option value="{{ $item->id }}">{{ $item->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="mb-3">
            <label for="solusi" class="form-label">Solusi</label>
            <textarea name="solusi" id="solusi" class="form-control" rows="4" required></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Save Solusi</button>
    </form>
    
@endsection
