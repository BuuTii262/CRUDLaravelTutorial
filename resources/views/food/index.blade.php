<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            padding : 100px;
        }
        .detail-image{
            width: 300px;
        }
        .a{
            text-decoration: none;
            color: black;
            
        }
        
    </style>


</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
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
                             
                
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>        

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>


</body>
</html>
