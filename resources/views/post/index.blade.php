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
        
    </style>


</head>

<body>
    <div class="container">
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

                                    <a href="{{ url('get-comments/'.$post->id) }}">
                                        <button type="button" class="btn btn-primary btn-sm">
                                            Commments
                                        </button>
                                    </a> 

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
    </div>        

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>