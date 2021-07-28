@extends('layouts.master')
@section('content')
    <div class="jumbotron text-center">
    <h1>Learning Center</h1>
    <div class="float-right mr-5">
        <a href="" class="btn btn-primary btnAdd" data-toggle="modal" data-target="#myModal">Add New Teacher</a>
    </div>
    </div>

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
@endsection