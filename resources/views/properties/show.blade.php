@extends('layouts.app')

@section('content')
<p><strong>Description:</strong> {{ $property->description }}</p>
<p><strong>Price:</strong> €{{ number_format($property->price) }}</p>
<p><strong>Address:</strong> {{ $property->address }}</p>
<p><strong>City:</strong> {{ $property->city }}</p>
<p><strong>Country:</strong> {{ $property->country }}</p>
<p><strong>Bedrooms:</strong> {{ $property->bedrooms }}</p>
<p><strong>Bathrooms:</strong> {{ $property->bathrooms }}</p>
<p><strong>Property Type:</strong> {{ $property->property_type }}</p>
<p><strong>Listing Date:</strong> {{ $property->listing_date }}</p>

@if($property->owner)
    <p><strong>Owner:</strong> {{ $property->owner->name }}</p>
@endif

@if($property->category)
    <p><strong>Category:</strong> {{ $property->category->name }}</p>
@endif

@if($property->agent)
    <p><strong>Agent:</strong> {{ $property->agent->name }}</p>
@endif

<a href="{{ route('properties.edit', $property->id) }}" class="btn btn-warning">Edit</a>
<a href="{{ route('properties.index') }}" class="btn btn-secondary">Back</a>
@endsection