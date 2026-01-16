@extends('layouts.app')

@section('content')
<h1>Properties</h1>
<a href="{{ route('properties.create') }}" class="btn btn-primary mb-3">Add New Property</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>ID</th>
            <th>Image</th>
            <th>Price</th>
            <th>Type</th>
            <th>Actions</th>
        </tr>
    </thead>
    <tbody>
        @foreach($properties as $property)
        <tr>
            <td>{{ $property->id }}</td>
        <td>No image</td>
            <td>€{{ number_format($property->price) }}</td>
            <td>{{ $property->property_type }}</td>
            <td>
                <a href="{{ route('properties.show', $property->id) }}" class="btn btn-sm btn-info">View</a>
                <a href="{{ route('properties.edit', $property->id) }}" class="btn btn-sm btn-warning">Edit</a>
                <form action="{{ route('properties.destroy', $property->id) }}" method="POST" class="d-inline">
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