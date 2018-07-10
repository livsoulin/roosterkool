@extends('layouts.home')

@section('content')

<div class="container">
    
    <div id ="myCarousel" class="carousel slide " data-ride="carousel" style="padding-bottom: 20px;">
            <ol class="carousel-indicators">
                
                @foreach($sliders as $i => $slider) 
                
                
                <li data-target="" data-slide-to ="{{$i}}" class="{{$i === 0 ? 'active' : ''}}"></li>
               
                @endforeach
                
            </ol>
            <div class="content" style="width: 300px; hight:700px;background: blueviolet;" ></div>
            <div class="carousel-inner">
                
                @foreach($sliders as $i => $slider) 

                <div class="item {{$i === 0 ? 'active' : ''}}">
                        
                    <img src="{{$slider->photo->file}}" width="1000px" class="img-responsive">
                    
                </div>
               
                @endforeach
                
            </div>
            <a class="carousel-control left" href="#myCarousel" data-slide="prev">
                <span class="icon-prev"></span>
            </a>
            <a class="carousel-control right" href="#myCarousel" data-slide="next">
                <span class="icon-next"></span>
            </a>

        </div>
   
</div>
@stop