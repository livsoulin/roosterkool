@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">

        @foreach($magazines as $magazine) 
       
        <div class="col-md-4 text-center"  style="padding-top: 10px; padding-bottom: 10px">
            <div class="card-body">
                <img style="width:200px;height:250px;" src="{{$magazine->photo ? $magazine->photo->file : '/images/imgplaceholder.jpg'}}"  class="col-sm-6">    
                
                <h1 class="card-title pricing-card-title col-sm-10" style="color: white;">{{$magazine->title}}   <i class="fa fa-download" style="font-size:18px;">({{$magazine->count}})</i></h1>
                
                <button onclick="window.location.href='/magazine/download/{{$magazine->id}}'" type="button"  class="btn btn-lg btn-block btn-primary">Download</button>
                
            </div>
        </div>

        @endforeach

    

    </div>
   
    
</div>

@stop