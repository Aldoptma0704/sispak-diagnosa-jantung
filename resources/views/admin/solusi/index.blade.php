@extends('admin.layouts.admin')

@section('content')
    <h3>List of Solutions</h3>
    <a href="{{ route('admin.solusi.create', ['diagnosis_id' => 1]) }}" class="btn btn-primary mb-3">Add New Solution</a> <!-- Update the diagnosis_id -->
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Diagnosis</th>
                    <th>Solution</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($solusi as $solution)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $solution->diagnosis->name }}</td>
                        <td>{{ $solution->solusi }}</td> 
                        <td>
                            <a href="{{ route('admin.solusi.edit', $solution->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.solusi.destroy', $solution->id) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
