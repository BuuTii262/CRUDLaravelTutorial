<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create page</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <style>
        body{
            padding : 100px;
        }
        .form-elememt{
            width: 170px;
            
        }
        .form-elememt input{
            display: none;
            
        }
        .form-elememt img{
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .form-elememt div{
            position: relative;
            height: 40px;
            background: rgba(0, 0, 0, 0.5);
            text-align: center;
            line-height: 40px;
            font-size: 13px;
            color: #f5f5f5;
            font-weight: 600;
        }
        .form-elememt div span{
            font-size: 40px;
        }
    </style>


</head>

<body>

   <div class="container">
        <div class="row">
            <div class="col-md-3"></div>
            <div class="col-md-6">
                <h5>Create Food</h5>
                <form action="{{ url('food') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <!-- or -->
                    <!-- @csrf -->
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text"
                         class="form-control @error('title') is-invalid @enderror" name="title" 
                        id="title" placeholder="Please Enter Food Title" value="{{ old('title') }}">
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
                        <div class="invalid-feedback" style="color: red;">Upload Image !</div>
                        @enderror 
                        
                        <label for="file-1" id="file-1-preview">
                            <img src="{{ asset('defaultPhoto/MoLogo.jpg') }}">
                            <div>
                                <span>+</span>
                            </div>
                        </label>
                        
                    </div>                   
                    <hr>

                    
                    <!-- <div class="form-group">
                        <label for="title">Food Image</label>
                        <br>
                        <img src="{{ asset('defaultPhoto/MoLogo.jpg') }}" width="100px" style="border: 3px solid gray;">
                        <br><br>
                        <input type="file" name="food_image" 
                        class="form-control @error('food_image') is-invalid @enderror">
                        @error('food_image')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div> -->


                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number"
                         class="form-control @error('price') is-invalid @enderror" name="price" 
                        id="price" placeholder="Please Enter Price" value="{{ old('price') }}">
                        @error('price')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    
                    <div class="form-group">
                        <label for="description">Description</label>
                        <textarea name="description" id="description" rows="3"
                        class="form-control @error('description') is-invalid @enderror" placeholder="Enter Description...">
                        {{ old('description') }}</textarea>
                        @error('description')
                        <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <hr>
                    <button class="btn btn-primary">Create</button>
                </form>
            </div>
            <div class="col-md-3"></div>
        </div>
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


</body>
</html>