@extends('layouts.home')

@section('content')
@if(Session::has('create_booking'))

<p class="bg-primary">{{session('create_booking')}}</p>

@endif
<div class="container">
    <section class="main-section contact" id="contact">

    <h2 style="text-align: center; color: white">BOOKING EVENT</h2>
	  <!-- <form class="form-horizontal" action="/action_page.php"> -->
	  	{!! Form::open(['method'=>'POST','action'=>'HomePageController@store','class'=>'form-horizontal']) !!}

	    <div class="form-group">
	      <label class="control-label col-sm-2" style="color: white;">Username:</label>
	      <div class="col-sm-6">
	        <input type="text" class="form-control"  placeholder="Enter Username" name="name">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" style="color: white;">Phone Number:</label>
	      <div class="col-sm-6">
	        <input type="text" class="form-control"  placeholder="Enter Phone Number" name="phonenumber">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" style="color: white;">DATE:</label>
	      <div class="col-sm-6">
	        <input type="date" class="form-control"  placeholder="Enter Date" name="booking_date">
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" style="color: white;">CATEGORY</label>
	      <div class="col-sm-6">
	         {!! Form::select('category_id',$category,null,['placeholder'=>'option','class'=>'form-control'])!!} 
	      </div>
	    </div>
	    <div class="form-group">
	      <label class="control-label col-sm-2" style="color: white;">BODY:</label>
	      <div class="col-sm-6">          
	       <textarea class="form-control" rows="5" name="body"></textarea>
	      </div>
	    </div>
	   
	    <div class="form-group">        
	      <div class="col-sm-offset-2 col-sm-10">
	        <button type="submit" class="btn btn-default">Submit</button>
	      </div>
	    </div>
	 {!! Form::close()!!}
	 <div class="row">
<!--alert error--> 
<!--include file error from folder include-->
    @include('include.form_error')
</div>
    </section>
</div>
@stop