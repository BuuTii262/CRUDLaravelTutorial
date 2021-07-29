@extends('layouts.master')
@section('content')
<br>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <h5>Lists</h5>
                <a href="{{ url('/posts/create') }}">
                <button class="btn btn-primary btn-sm float-right mb-2">Add New</button>
                </a>
                @if(Session('successAlert'))
                <div class="alert alert-success alert-dismissibel show fade">
                    <strong>{{ Session('successAlert') }}</strong>
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
                @endif
                <table class="table table-border table-hover">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Content</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        
                        @foreach($posts as $post)
                        <tr>
                            <td>Language{{ $post->id }}</td>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->content }}</td>
                            <td>
                                <form action="{{ url('posts/'.$post->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                    <a href="{{ url('posts/'.$post->id.'/edit') }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Edit
                                        </button>
                                    </a>    
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you want to delete it?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach  
                    </tbody>
                </table>               
                
            </div>
            <div class="col-md-2"></div>
        </div> 
        
@endsection

   