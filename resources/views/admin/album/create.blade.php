@extends('layouts.admin')




@section('content')



<h1 class="page-header">create title photo</h1>

{!! Form::open(['method'=>'POST','action'=>'AdminAlbumController@store','files' => true])!!}

<div class="form-group">
    {!! Form::label('name','Title')!!}
    {!! Form::text('name',null,['class'=>'form-control'])!!} 
</div>
<div class="form-group">
    {!! Form::label('category_id','Category')!!}
    {!! Form::select('category_id',$category,null,['placeholder'=>'option','class'=>'form-control'])!!} 
</div>
<!--<div class="form-group">
    <input  type="file" class="form-control" name="name[]" placeholder="" multiple>
</div>-->
<div class="form-group">
    {!! Form::submit('Create Album',['class' => 'btn btn-primary'])!!}
</div>


{!! Form::close()!!}


<div class="row">
<!--alert error--> 
<!--include file error from folder include-->
    @include('include.form_error')
</div>



@stop







