@extends('layouts.master')
@section('content')
<br>
    <a href="{{ url('/food') }}">
    <button class="btn btn-secondary btn-md float-left">Back</button>
    </a>
    <br>
    <br>
       <div class="row shadow-none p-3 mb-5 bg-light rounded">
           <div class="col-md-6">

            @if($food->food_image != "")
                                
            <img src="{{ asset('uploads/foods/'.$food->food_image) }}" class="imageDetail">
               
            @else                               

            <img src="{{ asset('defaultPhoto/MoLogo.jpg') }}" class="imageDetail">
                                
             @endif

           </div>
           <div class="col-md-6">
                <h1>{{$food->food_title}}</h1>
                <hr>
                <h3 class="text-primary">
                    Price : {{$food->price}} MMK
                </h3>

                <h4 class="text-secondary">
                    Description : {{$food->description}}
                </h4>              
           </div>

       </div>
    </div>        

   <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

@endsection