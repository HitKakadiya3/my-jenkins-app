@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Dashboard</h1>
    <div class="row">
        <div class="col-md-4">
            <div class="card text-white bg-info mb-3">
                <div class="card-header">Posts</div>
                <div class="card-body">
                    <h5 class="card-title">{{ $postCount }}</h5>
                    <p class="card-text">Total Posts</p>
                </div>
            </div>
        </div>
        <!-- Add more cards as needed -->
    </div>
</div>
@endsection
