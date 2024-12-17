@extends('admin.layouts.admin')

@section('content')
    <h3>List of Rules</h3>
    <a href="{{ route('admin.rules.create') }}" class="btn btn-primary mb-3">Add New Rule</a>
    <div class="table-responsive">
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Gejala</th>
                    <th>Diagnosis</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($rules as $rule)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>
                            @foreach ($rule->gejala as $gejala)
                                <span>{{ $gejala->name }}</span><br>
                            @endforeach
                        </td>
                        <td>{{ $rule->diagnosis->name }}</td>
                        <td>
                            <a href="{{ route('admin.rules.edit', $rule->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('admin.rules.destroy', $rule->id) }}" method="POST" class="d-inline">
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
