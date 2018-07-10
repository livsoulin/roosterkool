@extends('layouts.admin')

@section('content')
<h1 class="page-header">EDIT VIDEOS</h1>

<!--@include('include.tinyeditor')-->

<div class="row">
    
    <div class="col-sm-9">
        {!! Form::model($video,['method'=>'PATCH','action'=>['AdminVideoController@update',$video->id],'files' => true]) !!}


            <div class="form-group">
                {!! Form::label('title','Title')!!}
                {!! Form::text('title',null,['class'=>'form-control'])!!} 
            </div>

            

            
            <div class="form-group">
                {!! Form::label('body','Link:')!!}
                {!! Form::textarea('body',null,['class'=>'form-control'])!!} 
            </div>

            <div class="form-group">
                {!! Form::submit('Update Video',['class' => 'btn btn-primary col-sm-6'])!!}
            </div>
        {!! Form::close()!!}
        
        
        <!--form destroy-->
        {!! Form::open(['method'=>'DELETE','action'=>['AdminVideoController@destroy', $video->id]])!!}

            <div class="form-group">
                {!! Form::submit('Delete Video',['class' => 'btn btn-danger col-sm-6'])!!}
            </div>
        {!! Form::close()!!}
        
    </div>
</div>

<div class="row">
<!--alert error--> 
<!--include file error from folder include-->
<!--create request-->
    @include('include.form_error')
</div>


@stop
