@extends('layouts.master')
@section('content')
<br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5>Update Post</h5>
                
                <form action="{{ url('posts/'.$post->id) }}" method="POST">
                    {{ csrf_field() }}
                    @method('PUT')
                    <!-- or -->
                    <!-- @csrf -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                         class="form-control @error('title') is-invalid @enderror" name="title" 
                        id="title" placeholder="Please Enter Title" value="{{ $post->title ?? old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="content">Content</label>
                        <textarea name="content" id="content" rows="3"
                        class="form-control @error('content') is-invalid @enderror" name="title" placeholder="Enter Content..." >
                        {{ $post->content ?? old('content') }}
                        </textarea>
                        @error('content')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
@endsection