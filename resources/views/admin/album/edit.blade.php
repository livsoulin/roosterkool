@extends('layouts.admin')




@section('content')



<h1 class="page-header">create title photo</h1>


{!! Form::model($title,['method'=>'PATCH','action'=>['AdminAlbumController@update',$title->id],'files' => true]) !!}
<div class="form-group">
    {!! Form::label('name','Title')!!}
    {!! Form::text('name',null,['class'=>'form-control'])!!} 
</div>
<div class="form-group">
    {!! Form::label('category_id','Category')!!}
    {!! Form::select('category_id',$category,null,['placeholder'=>'option','class'=>'form-control'])!!} 
</div>

<div class="form-group">
    {!! Form::submit('Update Album',['class' => 'btn btn-primary col-sm-6'])!!}
</div>
{!! Form::close()!!}


<!--form destroy-->
    {!! Form::open(['method'=>'DELETE','action'=>['AdminAlbumController@destroy', $title->id]])!!}
    <div class="form-group">
        {!! Form::submit('Delete User',['class' => 'btn btn-danger col-sm-6'])!!}
    </div>
    {!! Form::close()!!}

<div class="row">
    @include('include.form_error')
</div>



@stop







