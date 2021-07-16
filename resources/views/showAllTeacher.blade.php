<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teachers</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="jumbotron text-center">
    <h1>Learning Center</h1>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#myModal">Add New Teacher</a>
    </div>
    </div>

    <div class="container">

    <div class="row"> 
        <div class="col-2">

        <div class="list-group">
            <a href="/teacher" class="list-group-item list-group-item-action">Teachers</a>
            <a href="/student" class="list-group-item list-group-item-action">Student</a>
        </div>

        </div>

        <div class="col-10">

        <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Teacher Name</th>
                <th>Subject</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
            @foreach($teachers as $teacher)
            <tr>
                <td>{{$teacher->id}}</td>
                <td>{{$teacher->teacher_name}}</td>
                <td>{{$teacher->subject}}</td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm editBtn" data-toggle="modal" data-target="#myModal">Edit</a></td>
                <td>
                    <form action="teacher/{{ $teacher->id }}" method="POST">
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

    

    </div>




    <div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Add Teacher</h4>
      </div>
      <div class="modal-body">


      <form action="teacher" method="POST" id="form">
          @csrf
          <div class="form group">
              <label>Teacher Name</label>
              <input type="text" name="teacher_name" class="form-control" id="name">
          </div>
          
          <div class="form group">
              <label>Subject</label>
              <input type="text" name="subject" class="form-control" id="subject">
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
        subject = e.target.parentElement.previousElementSibling.innerText;
        name = e.target.parentElement.previousElementSibling.previousElementSibling.innerText;
        id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;

        $('#name').val(name);
        $('#subject').val(subject);
        $('#form').attr('action','teacher/'+id);
        $('#form').append("<input type='hidden' name='_method' value='PUT'>");

        $('#myModal').modal('show');

    })

    $('.btnAdd').click(function(){

$('#name').val("");
$('#subject ').val("");


});
</script>
</body>
</html>