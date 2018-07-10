@extends('layouts.home')

@section('content')
<!-- <div class="container">
    <div class="row">
         @foreach($albums as $album) 
         <div class="col-md-4 text-center"  style="padding-top: 10px; padding-bottom: 10px">
            <div class="card-body">
                <img src="{{$album ? $album->file : '/images/imgplaceholder.jpg'}}" style="width:auto;height:250px;"  class="col-sm-12">    
                
                 
            </div>
        </div>
         
         @endforeach
    </div>
</div>
 -->


<div class="container">
@foreach($albums as $i => $album) 
  <div class="mySlides">
    <div class="numbertext">{{$a = $i+1 .'/'.count($albums)}}</div>
    <img src="{{$album ? $album->file : '/images/imgplaceholder.jpg'}}" style="width:90%;">
  </div>
@endforeach
    
  <a class="prev" onclick="plusSlides(-1)">❮</a>
  <a class="next" onclick="plusSlides(1)">❯</a>


  <div class="caption-container">
    <p id="caption"></p>
  </div>

  <div class="row">
  	@foreach($albums as $i => $album) 
  	@if ($i <=5 )
    <div class="column">
      <img class="demo cursor" src="{{$album ? $album->file : '/images/imgplaceholder.jpg'}}" style="width:100%" onclick="currentSlide({{$i+1}})" alt="">
    </div>
    @endif
    @endforeach
  </div>
 	
</div>

@stop




@section('scripts')
	<script>
	var slideIndex = 1;
	showSlides(slideIndex);

	function plusSlides(n) {
	  showSlides(slideIndex += n);
	}

	function currentSlide(n) {
	  showSlides(slideIndex = n);
	}

	function showSlides(n) {
	  var i;
	  var slides = document.getElementsByClassName("mySlides");
	  var dots = document.getElementsByClassName("demo");
	  var captionText = document.getElementById("caption");
	  if (n > slides.length) {slideIndex = 1}
	  if (n < 1) {slideIndex = slides.length}
	  for (i = 0; i < slides.length; i++) {
	      slides[i].style.display = "none";
	  }
	  for (i = 0; i < dots.length; i++) {
	      dots[i].className = dots[i].className.replace(" active", "");
	  }
	  slides[slideIndex-1].style.display = "block";
	  dots[slideIndex-1].className += " active";
	  captionText.innerHTML = dots[slideIndex-1].alt;
	}
	</script>
@stop