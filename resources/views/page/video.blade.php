@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">
         @foreach($videos as $video) 
         <div class="col-md-4 text-center"  style="padding-top: 10px; padding-bottom: 10px">
            <div class="card-body">
                
                <iframe src="{{$video->body}}"></iframe>
                 
            </div>
        </div>
         
         @endforeach
    </div>
</div>
@stop