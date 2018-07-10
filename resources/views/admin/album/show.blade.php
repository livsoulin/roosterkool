@extends('layouts.admin')
@section('styles')
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.css">
@stop
@section('content')

<h1 class="page-header">Show photo</h1>

<button class="btn btn-default"><a href="{{route('album.index')}}">Back</a></button>

<h3>upload photo</h3>
{!! Form::open(['method'=>'POST','action'=>'AdminAlbumController@createimage','class'=>'dropzone'])!!}

<input type="hidden" name="id" value="{{$titleid}}">
{!! Form::close()!!}

<hr>
@if($photos)
{!! Form::open(['method'=>'DELETE','action'=>'AdminAlbumController@deleteAlbum','class'=>'form-inline'])!!}
    
    <div class="form-group">
        <select name="checkBoxArray" id="" class="form-control">
            <option value="">Delete</option>
        </select>
    </div>
    <div class="form-group">
        {!! Form::submit('submit',['class' => 'btn-primary'])!!}
    </div>

<table class="table">
    <thead>
        <tr>
            <th><input type="checkbox" id="options"></th>
            <th>Id</th>
            <th>Name</th>
            <th>Created_at</th>
        </tr>
    </thead>
    <tbody>
        @foreach($photos as $photo)
        <tr>
            <td><input class="checkBoxes" type="checkbox" name="checkBoxArray[]" value="{{$photo->id}}"></td>
            <td>{{$photo->id}}</td>
            <td><img height="50px" src="{{$photo->file ? $photo->file : 'imagplaceholder.jpg'}}"></td>
            <td>{{$photo->created_at ? $photo->created_at->diffForHumans() :'-'}}</td>
            <td>
                
                
                
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{!! Form::close()!!}
@endif
@stop








@section('scripts')

<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.4.0/min/dropzone.min.js"></script>
<script>
        
        $(document).ready(function(){
            
            $('#options').click(function(){
                
                if(this.checked){
                    $('.checkBoxes').each(function(){
                        this.checked = true;
                    })
                }else{
                    $('.checkBoxes').each(function(){
                        this.checked = false;
                    })
                }
                
                console.log('helo')
            });
            
        });
   
        
 

</script>

@stop