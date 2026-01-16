@extends('layouts.app')

@section('content')
<h1>Add New Property</h1>
<form action="{{ route('properties.store') }}" method="POST">
    @csrf
    
    <div class="mb-3">
        <label>Description</label>
        <textarea name="description" class="form-control" required></textarea>
    </div>
    
    <div class="mb-3">
        <label>Address</label>
        <input type="text" name="address" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>City</label>
        <input type="text" name="city" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Country</label>
        <input type="text" name="country" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Price</label>
        <input type="number" name="price" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Bedrooms</label>
        <input type="number" name="bedrooms" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Bathrooms</label>
        <input type="number" name="bathrooms" class="form-control">
    </div>
    
    <div class="mb-3">
        <label>Property Type</label>
        <select name="property_type" class="form-control" required>
            <option value="">Select Type</option>
            <option value="house">House</option>
            <option value="apartment">Apartment</option>
            <option value="condo">Condo</option>
            <option value="villa">Villa</option>
        </select>
    </div>
    
    <div class="mb-3">
        <label>Listing Date</label>
        <input type="date" name="listing_date" class="form-control" required>
    </div>
    
    <div class="mb-3">
        <label>Owner</label>
        <select name="owner_id" class="form-control" required>
            @foreach($owners as $owner)
            <option value="{{ $owner->id }}">{{ $owner->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label>Category</label>
        <select name="category_id" class="form-control" required>
            @foreach($categories as $category)
            <option value="{{ $category->id }}">{{ $category->name }}</option>
            @endforeach
        </select>
    </div>
    
    <div class="mb-3">
        <label>Agent</label>
        <select name="agent_id" class="form-control" required>
            @foreach($agents as $agent)
            <option value="{{ $agent->id }}">{{ $agent->name }}</option>
            @endforeach
        </select>
    </div>
    
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('properties.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection