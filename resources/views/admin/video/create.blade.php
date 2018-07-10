@extends('layouts.admin')

@section('content')

<!--@include('include.tinyeditor')-->


@if(Session::has('create_video'))
    <p class="bg-primary">{{session('create_video')}}</p>
@endif
<h1 class="page-header">CREATE VIDEO</h1>


<div class="row">
{!! Form::open(['method'=>'POST','action'=>'AdminVideoController@store','files' => true]) !!}


    <div class="form-group">
        {!! Form::label('title','Title')!!}
        {!! Form::text('title',null,['class'=>'form-control'])!!} 
    </div>

    
        

    <div class="form-group">
        {!! Form::label('body','Link:')!!}
        {!! Form::textarea('body',null,['class'=>'form-control'])!!} 
    </div>

    <input type="hidden" name="is_active" value="1">

    <div class="form-group">
        {!! Form::submit('Create video',['class' => 'btn btn-primary'])!!}
    </div>
    {!! Form::close()!!}
</div>

<div class="row">
<!--alert error--> 
<!--include file error from folder include-->
    @include('include.form_error')
</div>


@stop
