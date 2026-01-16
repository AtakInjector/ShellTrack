@extends('layouts.app')

@section('content')
<h1>Add New Owner</h1>
<form action="{{ route('owners.store') }}" method="POST">
    @csrf
    <div class="mb-3">
        <label>Name</label>
        <input type="text" name="name" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Email</label>
        <input type="email" name="email" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Phone</label>
        <input type="text" name="phone" class="form-control" required>
    </div>
    <div class="mb-3">
        <label>Address</label>
        <textarea name="address" class="form-control"></textarea>
    </div>
    <button type="submit" class="btn btn-primary">Save</button>
    <a href="{{ route('owners.index') }}" class="btn btn-secondary">Cancel</a>
</form>
@endsection