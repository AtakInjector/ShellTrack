@extends('layouts.app')

@section('content')
<h1>Owners</h1>
<a href="{{ route('owners.create') }}" class="btn btn-primary mb-3">Add New Owner</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($owners as $owner)
        <tr>
            <td>{{ $owner->id }}</td>
            <td>{{ $owner->name }}</td>
            <td>{{ $owner->email }}</td>
            <td>{{ $owner->phone }}</td>
            <td>
                <a href="{{ route('owners.show', $owner->id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('owners.destroy', $owner->id) }}" method="POST" class="d-inline">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection