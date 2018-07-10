@extends('layouts.admin')

@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@stop



@section('content')
    


<h1 class="page-header">upload photo</h1>
<button class="btn btn-default"><a href="{{route('album.index')}}">Back</a></button>
<hr>


{!! Form::open(['method'=>'POST','action'=>'AdminAlbumController@createimage','class'=>'dropzone'])!!}

<input type="hidden" name="id" value="{{$id}}">
{!! Form::close()!!}




@stop






@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>

@stop