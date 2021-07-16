<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>Comments</title>
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
            <h5>Comments</h5>
            <a href="{{ url('/posts') }}">
                <button class="btn btn-primary btn-sm float-left mb-2">Posts</button>
            </a>
            <a href="{{ url('/createcom') }}">
                <button class="btn btn-primary btn-sm float-right mb-2">Add New Comment</button>
            </a>
            <table class="table table-border table-hover">
                <thead>
                    <tr>                       
                        <th>Comments</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($comments as $comment)
                    <tr>
                        <td>{{ $comment->comment }}</td>
                        <td>
                            <button type="button" class="btn btn-primary btn-sm">
                            Edit
                            </button>
                            <button type="button" class="btn btn-danger btn-sm">
                            Delete
                            </button>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>

            </div>
            <div class="col-md-2"></div>       
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    
</body>
</html>