@extends('layouts.admin')

@section('content')

@if(Session::has('create_magazine'))
    
<p class="bg-primary">{{session('create_magazine')}}</p>

@endif


<h1 class="page-header">Create Magazine</h1>

{!! Form::open(['method'=>'POST','action'=>'AdminMagazineController@store','files' => true]) !!}


<div class="form-group">
    {!! Form::label('title','Title')!!}
    {!! Form::text('title',null,['class'=>'form-control'])!!} 
</div>
<div class="form-group">
    {!! Form::label('photo_id','Cover-Magazine')!!}
    {!! Form::file('photo_id',null,['class'=>'form-control'])!!} 
</div>

<div class="form-group">
    {!! Form::label('file_download','Links-Magazine')!!}
    {!! Form::text('file_download',null,['placeholder'=>'link from google-Drive','class'=>'form-control'])!!} 
</div>

<input type="hidden" name="is_active" value="1">

<div class="form-group">
    {!! Form::label('count','View-count')!!}
    {!! Form::text('count',1,['class'=>'form-control'])!!} 
</div>
<!--upload photo or files-->
{!! Form::token() !!}
<div class="form-group">
    {!! Form::submit('Create Magazine',['class' => 'btn btn-primary'])!!}
</div>
{!! Form::close()!!}

<!--alert error--> 
<!--include file error from folder include-->
@include('include.form_error')



@stop
