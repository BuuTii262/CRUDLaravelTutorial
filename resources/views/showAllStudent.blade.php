@extends('layouts.master')
@section('content')
    <div class="jumbotron text-center">
    <h1>Learning Center</h1>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#myModal">Add New Student</a>
    </div>
    </div>

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
                <!-- fix error -->

                @if(!empty($student->teachers[0]))
                <td>{{ $student->teachers[0]-> teacher_name }}</td>
                <td>{{ $student->teachers[0]->subject }}
                    <input type="hidden" value="{{$student->teachers[0]->id}}">
                </td>
                @else
                <td>-</td>
                <td>-<input type="hidden" value=""></td>
                @endif
                
                
               
                
                
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

@endsection