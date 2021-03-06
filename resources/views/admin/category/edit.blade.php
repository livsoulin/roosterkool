
@extends('layouts.admin')

@section('content')
    
<h1 class="page-header">Category EDIT</h1>

<div class="col-sm-6">
    {!! Form::model($category,['method'=>'PATCH','action'=>['AdminCategoryController@update',$category->id] ])!!}
        <div class="form-group">
            {!! Form::label('name','Name')!!}
            {!! Form::text('name',null,['class'=>'form-control'])!!} 
        </div>
        <div class="form-group">
            {!! Form::submit('Edit Category',['class' => 'btn btn-primary col-sm-6'])!!}
        </div>
    {!! Form::close()!!}
    
<!--    {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$category->id] ])!!}
        <div class="form-group">
            {!! Form::submit('detete Category',['class' => 'btn btn-danger col-sm-6'])!!}
        </div>
    {!! Form::close()!!}-->
</div>



@stop