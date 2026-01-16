@extends('layouts.app')

@section('content')
<h1>Dashboard</h1>
<p>Welcome to Real Estate Agent Portal</p>
<div class="row">
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Properties</h5>
                <p class="card-text">{{ $total_properties }}</p>
                <a href="{{ route('properties.index') }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
    <div class="col-md-3">
        <div class="card">
            <div class="card-body">
                <h5 class="card-title">Owners</h5>
                <p class="card-text">{{ $total_owners }}</p>
                <a href="{{ route('owners.index') }}" class="btn btn-primary">View</a>
            </div>
        </div>
    </div>
</div>
@endsection