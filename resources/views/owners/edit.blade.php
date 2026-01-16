@extends('layouts.app')

@section('content')
<h1>Edit Owner</h1>
<form action="{{ route('owners.update', $owner->id) }}" method="POST">
    @csrf
    @method('PUT')
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" value="{{ $owner->name }}" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" value="{{ $owner->email }}" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" value="{{ $owner->phone }}" required>
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control">{{ $owner->address }}</textarea>
    </div>
    <button type="submit" class="btn btn-primary">Update</button>
    <a href="{{ route('owners.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection