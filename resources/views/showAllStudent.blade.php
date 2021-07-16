<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</head>
<body>
    <div class="jumbotron text-center">
    <h1>Learning Center</h1>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#myModal">Add New Student</a>
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
                <th>Student Name</th>
                <th>Email</th>               
                <th>Teacher Name</th>
                <th>Subject</th>
                <th colspan="2">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach($students as $student)
            <tr>
                <td>{{$student->id}}</td>
                <td>{{$student->student_name}}</td>
                <td>{{$student->email}}</td>
                
                <td>{{ $student->teachers[0]->teacher_name }}</td>
                <td>{{ $student->teachers[0]->subject }}
                    <input type="hidden" value="{{$student->teachers[0]->id}}"></td>
                <td>
                    <a href="javascript:void(0)" class="btn btn-primary btn-sm editBtn">
                    Eidt              
                    </a>
                </td>
                <td>
                    <form action="student/{{ $student->id }}" method="POST">
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
        <h4 class="modal-title">Add Student</h4>
      </div>
      <div class="modal-body">


      <form action="student" method="POST" id="form">
          @csrf
          <div class="form group">
              <label>Student Name</label>
              <input type="text" name="student_name" class="form-control" id="name">
          </div>
          
          <div class="form group">
              <label>Email</label>
              <input type="text" name="email" class="form-control" id="email">
          </div>

          <div class="form group">
              <label>Teacher Id</label>
              <!-- <input type="text" name="teacher_id" class="form-control" id="teacher_id"> -->
              <select name="teacher_id" class="form-control" id="teacher_id">
                  <option value="" selected disabled>Select Teacher</option>
                  @foreach($teachers as $teacher)
                  <option value="{{ $teacher->id }}">{{ $teacher->teacher_name }}</option>
                  @endforeach
              </select>
          </div>
          <br>

          <div class="form group">
              <input type="submit" name="submit" class="btn btn-success btnsubmit">
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
        teacher_id = e.target.parentElement.previousElementSibling.querySelector('input[type="hidden"]').value;
        window.alert(teacher_id);
        email = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
        name = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;
        id = e.target.parentElement.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.previousElementSibling.innerText;

        $('#name').val(name);
        $('#email').val(email);
        $('#teacher_id').val(teacher_id);

        $('#form').attr('action','student/'+id);
        $('#form').append("<input type='hidden' name='_method' value='PUT'>"); 
        
        $('#myModal').modal('show');
    })

    

</script>

<script>

$('.btnAdd').click(function(){

$('#name').val("");
$('#email').val("");
$('#teacher_id').val("");

});
</script>


</body>
</html>