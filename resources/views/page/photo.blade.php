@extends('layouts.home')

@section('content')
<div class="container">
    <div class="row">

        @foreach ($albums as $album)
       

       
        <div class="col-md-6 text-center"  style="padding-top: 10px; padding-bottom: 10px">
            <div class="card-body">
                
                <img style="width:auto;height:250px;" src="{{$album ? $album->file : '/images/imgplaceholder.jpg'}}"  class="col-sm-6">    
               
                <h3 class="card-title pricing-card-title col-sm-10" style="color: white;text-align: center; margin-bottom: 10px; margin-top: 10px;margin-left: 50px">
                    {{$album ? $album->album->name : '-'}}
                </h3>
                
                <button onclick="window.location.href='/album/{{$album ? $album->album->id : '-'}}'" type="button"   class="btn btn-lg btn-primary">view more</button>
                
            </div>
        </div>
       
        @endforeach 
    </div>  
</div>
@stop

<!-- style="text-align: center; margin-left:100px;" -->