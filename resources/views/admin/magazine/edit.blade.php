@extends('layouts.admin')

@section('content')
<h1 class="page-header">EDIT Magazine</h1>

<div class="row">
    <div class="col-sm-3">

        <img src="{{$magazine->photo ? $magazine->photo->file : '/images/imgplaceholder.jpg'}}" class="img-responsive img-rounded">


    </div>

    <div class="col-sm-9">

        {!! Form::model($magazine,['method'=>'PATCH','action'=>['AdminMagazineController@update', $magazine->id],'files' => true]) !!}

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
            {!! Form::text('file_download',null,['class'=>'form-control'])!!} 
        </div>

        <input type="hidden" name="is_active" value="1">

        <div class="form-group">
            {!! Form::label('count','View-count')!!}
            {!! Form::text('count',null,['class'=>'form-control'])!!} 
        </div>

        {!! Form::token() !!}
        <div class="form-group">
            {!! Form::submit('Update User',['class' => 'btn btn-primary col-sm-6'])!!}
        </div>
        {!! Form::close()!!}




        <!--form destroy-->
        {!! Form::open(['method'=>'DELETE','action'=>['AdminMagazineController@destroy', $magazine->id]])!!}

        <div class="form-group">
            {!! Form::submit('Delete Magazine',['class' => 'btn btn-danger col-sm-6'])!!}
        </div>
        {!! Form::close()!!}


    </div>
</div>

<div class="row">

    <!--alert error--> 
    <!--include file error from folder include-->
    @include('include.form_error')

</div>

@stop
