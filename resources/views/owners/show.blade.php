@extends('layouts.app')

@section('content')
<h1>{{ $owner->name }}</h1>
<p>Email: {{ $owner->email }}</p>
<p>Phone: {{ $owner->phone }}</p>
<p>Address: {{ $owner->address }}</p>

<h3>Properties</h3>
<ul>
    @foreach($owner->properties as $property)
    <a href="{{ route ('properties.show', $property->id)   }}" ><li>{{ $property->city }} - €{{ $property->price }}</li>
        </a>
    @endforeach
</ul>

<a href="{{ route('owners.edit', $owner->id) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('owners.index') }}" class="btn btn-secondary">Back</a>
@endsection