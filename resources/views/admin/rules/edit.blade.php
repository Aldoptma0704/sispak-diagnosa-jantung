@extends('admin.layouts.admin')

@section('content')
    <h3>Edit Rule</h3>
    <form action="{{ route('admin.rules.update', $rule->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="gejala_id" class="form-label">Gejala</label>
            <div class="form-check">
                @foreach ($gejala as $item)
                    <input type="checkbox" name="gejala_id[]" class="form-check-input" value="{{ $item->id }}" 
                        id="gejala_{{ $item->id }}"
                        @if(in_array($item->id, $rule->gejala->pluck('id')->toArray())) checked @endif>
                    <label class="form-check-label" for="gejala_{{ $item->id }}">{{ $item->name }}</label>
                    <br>
                @endforeach
            </div>
        </div>

        <div class="mb-3">
            <label for="diagnosis_id" class="form-label">Diagnosis</label>
            <select name="diagnosis_id" id="diagnosis_id" class="form-control" required>
                @foreach ($diagnosis as $item)
                    <option value="{{ $item->id }}" {{ $rule->diagnosis_id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update Rule</button>
    </form>
@endsection
