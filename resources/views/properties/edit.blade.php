@extends('layouts.app')

@section('content')
<h1>Edit Property</h1>
<form action="{{ route('properties.update', $property->id) }}" method="POST">
    @csrf
    @method('PUT')
    
    
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required>{{ $property->description }}</textarea>
    </div>
    
    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control" value="{{ $property->address }}">
    </div>
    
    <div class="mb-3">
        <label>City</label>
        <input type="text" name="city" class="form-control" value="{{ $property->city }}">
    </div>
    
    <div class="mb-3">
        <label>Country</label>
        <input type="text" name="country" class="form-control" value="{{ $property->country }}">
    </div>
    
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" value="{{ $property->price }}" required>
    </div>
    
    <div class="mb-3">
        <label>Bedrooms</label>
        <input type="number" name="bedrooms" class="form-control" value="{{ $property->bedrooms }}">
    </div>
    
    <div class="mb-3">
        <label>Bathrooms</label>
        <input type="number" name="bathrooms" class="form-control" value="{{ $property->bathrooms }}">
    </div>
    
    <div class="mb-3">
        <label>Property Type</label>
        <select name="property_type" class="form-control" required>
            <option value="house" {{ $property->property_type == 'house' ? 'selected' : '' }}>House</option>
            <option value="apartment" {{ $property->property_type == 'apartment' ? 'selected' : '' }}>Apartment</option>
            <option value="condo" {{ $property->property_type == 'condo' ? 'selected' : '' }}>Condo</option>
            <option value="villa" {{ $property->property_type == 'villa' ? 'selected' : '' }}>Villa</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label>Listing Date</label>
        <input type="date" name="listing_date" class="form-control" value="{{ $property->listing_date }}" required>
    </div>
    
    <div class="mb-3">
        <label>Owner</label>
        <select name="owner_id" class="form-control" required>
            @foreach($owners as $owner)
            <option value="{{ $owner->id }}" {{ $property->owner_id == $owner->id ? 'selected' : '' }}>
                {{ $owner->name }}
            </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ $property->category_id == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label>Agent</label>
        <select name="agent_id" class="form-control" required>
            @foreach($agents as $agent)
            <option value="{{ $agent->id }}" {{ $property->agent_id == $agent->id ? 'selected' : '' }}>
                {{ $agent->name }}
            </option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('properties.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection