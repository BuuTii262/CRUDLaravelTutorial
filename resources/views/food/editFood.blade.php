@extends('layouts.master')
@section('content')
<br>
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5>Edit Food</h5>
                <form action="{{ url('food/'.$food->id) }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    @method('PUT')
                    <!-- or -->
                    <!-- @csrf -->
                    <div class="form-group" >
                        <label for="title">Title</label>
                        <input type="text"
                         class="form-control @error('title') is-invalid @enderror" name="title" 
                        id="title" placeholder="Please Enter Food Title" value="{{ $food->food_title ?? old('title') }}">
                        @error('title')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>

                    <div class="form-elememt">
                        <label for="file">Food Image</label><br>
                            <input type="file" id="file-1" name="food_image" 
                            class="form-control @error('food_image') is-invalid @enderror">
                            @error('food_image')
                            <div class="invalid-feedback">{{ $message }}</div>
                            @enderror 
                            <label for="file-1" id="file-1-preview">
                            @if($food->food_image != "")
                            <img src="{{ asset('uploads/foods/'.$food->food_image) }}">
                            @else
                            <img src="{{ asset('defaultPhoto/MoLogo.jpg') }}">
                            @endif
                            
                            <div>
                                <span>+</span>
                            </div>
                        </label>
                    </div>
                    <hr>
                    
                    <!-- <div class="form-group">
                    <label for="title">Food Image</label><br>
                        @if($food->food_image != "")                               

                                <img src="{{ asset('uploads/foods/'.$food->food_image) }}" width="100px" style="border: 3px solid gray;">
                            
                        @else                            

                                <img src="{{ asset('defaultPhoto/MoLogo.jpg') }}" width="100px" style="border: 3px solid gray;">
                            
                        @endif
                            <br><br>
                        
                        <input type="file" name="food_image" class="form-control">
                        
                    </div> -->


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"
                         class="form-control @error('price') is-invalid @enderror" name="price" 
                        id="price" placeholder="Please Enter Price" value="{{ $food->price ?? old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>

                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3"
                        class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description...">
                        {{ $food->description ?? old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <button class="btn btn-primary">Update</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>



   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>

    function previewBeforeUpload(id){
        document.querySelector("#"+id).addEventListener("change",function(e){
            if(e.target.files.length==0){
                return;

            }
            let file = e.target.files[0];
            let url = URL.createObjectURL(file);
            document.querySelector("#"+id+"-preview div").innerText = file.name;
            document.querySelector("#"+id+"-preview img").src = url;

        });
    }
    previewBeforeUpload("file-1");

    </script>

    @endsection
