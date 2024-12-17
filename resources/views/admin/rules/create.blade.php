@extends('admin.layouts.admin')

@section('content')
    <h3>Create New Rule</h3>

    <form action="{{ route('admin.rules.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label for="gejala_id" class="form-label">Gejala</label>
        <div class="form-check">
            @foreach ($gejala as $item)
                <input type="checkbox" name="gejala_id[]" class="form-check-input" value="{{ $item->id }}" id="gejala_{{ $item->id }}">
                <label class="form-check-label" for="gejala_{{ $item->id }}">{{ $item->name }}</label>
                <br>
            @endforeach
        </div>
    </div>

    <div class="mb-3">
        <label for="diagnosis_id" class="form-label">Diagnosis</label>
        <select name="diagnosis_id" class="form-control" required>
            <option value="">Select Diagnosis</option>
            @foreach ($diagnosis as $item)
                <option value="{{ $item->id }}">{{ $item->name }}</option>
            @endforeach
        </select>
    </div>

    <button type="submit" class="btn btn-primary">Save Rule</button>
</form>

@endsection