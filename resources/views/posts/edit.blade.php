@extends('layouts.app')

@section('content')
<div class="container">
    <h1>Edit Post</h1>
    <form method="POST" action="{{ route('posts.update', $post) }}">
        @csrf @method('PUT')
        <div class="form-group">
            <label>Title</label>
            <input name="title" class="form-control" value="{{ $post->title }}" required>
        </div>
        <div class="form-group">
            <label>Content</label>
            <textarea name="content" class="form-control" required>{{ $post->content }}</textarea>
        </div>
        <button class="btn btn-success">Update</button>
    </form>
</div>
@endsection
