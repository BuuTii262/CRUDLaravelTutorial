@extends('layouts.master')
@section('content')
<br>
                <h3><a class="a" href="{{ url('/food') }}">Food Lists</a></h3>
                <div class="row">
                    <div class="col-md-6">
                        <form action="/searchfood" method="GET">
                    
                            <div class="input-group">
                                <input type="text" class="form-control" name="search"
                                placeholder="Enter name to search" value="{{ old('search') }}">
                                <span class="input-group-prepend">
                                    <button type="submit" class="btn btn-primary">Search</button>
                                </span>
                            
                            </div>
                                            
                        </form>

                    </div>
                    <div class="col-md-6">
                        <a href="{{ url('/food/create') }}">
                        <button class="btn btn-primary float-right mb-2">Add New Food</button>
                        </a>                       
                    </div>
                </div>
                
                
                @if(Session('successAlert'))
                <div class="alert alert-success alert-dismissibel show fade">
                    <strong>{{ Session('successAlert') }}</strong>
                    <button class="close" data-dismiss="alert">&times;</button>
                </div>
                @endif

                <br>
                <table class="table table-border table-hover">
                    <thead>
                        <tr>
                            
                            <th>Title</th>
                            <th>Image</th>
                            <th>Price</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(empty($foods))

                        <tr>
                            <td colspan="5">
                                Data Not Exists
                            </td>
                        </tr>
                        @endif
                        
                        @foreach($foods as $food)
                        <tr>
                            
                            <td>{{ $food->food_title }}</td>
                            <td>
                                @if($food->food_image != "")
                                
                                    <img src="{{ asset('uploads/foods/'.$food->food_image) }}" width="100px" style="border: 3px solid gray;">
                                
                                @else
                                

                                    <img src="{{ asset('defaultPhoto/MoLogo.jpg') }}" width="100px" style="border: 3px solid gray;">
                              
                                @endif
                                
                            </td>
                            <td>{{ $food->price }}</td>
                            <td>
                                <form action="{{ url('food/'.$food->id) }}" method="POST">
                                @csrf
                                @method('DELETE')

                                    <a href="{{url('food/'.$food->id)}}">
                                        <button type="button" class="btn btn-secondary btn-sm">
                                            Show
                                        </button>
                                    </a> 
                                    <a href="{{ url('food/'.$food->id.'/edit') }}">
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
                <div class="pagination-block d-flex justify-content-center">
                {{ $foods->links('layouts.paginationlink') }}
                </div>         

@endsection
