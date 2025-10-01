@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Create Post</h1>
    <form method="POST" action="{{ route('posts.store') }}">
        @csrf
        <div class="form-group">
            <label>Title</label>
            <input name="title" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" required></textarea>
        </div>
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
