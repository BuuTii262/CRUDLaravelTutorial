<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Users</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
<div class="jumbotron text-center">
    <h1>USERS</h1>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#myModal">Add New User</a>
    </div>
</div>

    <div class="container">

        <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Email</th>
                <th>Phone</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($users as $user)
            <tr>
                <td>{{$user->id}}</td>
                <td>{{$user->name}}</td>
                <td>{{$user->email}}</td>
                <td>{{$user->phone->phone}}</td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm editBtn" data-toggle="modal" data-target="#myModal">Edit</a></td>
                <td>
                    <form action="user/{{ $user->id }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <input type="submit" class="btn btn-danger btn-sm" value="Delete" onclick="return confirm('Are you want to delete it?')">
                    </form>
                </td>
            </tr>

            @endforeach
        </tbody>

        </table>

        </div>

    </div>






<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Teacher</h4>
      </div>
      <div class="modal-body">


      <form action="user" method="POST" id="form">
          @csrf
          <div class="form group">
              <label>Name</label>
              <input type="text" name="name" class="form-control" id="name">
          </div>
          
          <div class="form group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" id="email">
          </div>

          <div class="form group">
              <label>Phone</label>
              <input type="text" name="phone" class="form-control" id="phone">
          </div>
          <br>

          <div class="form group">
              <input type="submit" name="submit" class="btn btn-success">
          </div>

      </form>
</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>


<script>

    $('.editBtn').click(function(e){
        phone = e.target.parentElement.previousElementSibling.innerText
        email = e.target.parentElement.previousElementSibling.previousElementSibling.innerText;
        name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
        id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;

        $('#name').val(name);
        $('#email').val(email);
        $('#phone').val(phone);
        $('#form').attr('action','user/'+id);
        $('#form').append("<input type='hidden' name='_method' value='PUT'>");

        $('#myModal').modal('show');

    })

    $('.btnAdd').click(function(){

$('#name').val("");
$('#email ').val("");
$('#phone ').val("");


});
</script>

    
</body>
</html>