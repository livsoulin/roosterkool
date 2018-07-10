@extends('layouts.admin')

@section('content')

<!--//show sesion flash-->
@if(Session::has('delete_magazine'))
    
<p class="bg-danger">{{session('delete_magazine')}}</p>

@endif



<h1 class="page-header">Magazine</h1>



<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Title</th>
            <th>Cover-Magazine</th>
            <th>Link-Magazine</th>
            <th>View-Count</th>
           
            <th>created_at</th>
            <th>Updated_at</th>
        </tr>
    </thead>
    <tbody>
        @if($magazines)
            @foreach($magazines as $magazine)
        <tr>
            <td>{{$magazine->id}}</td>
            <td><a href="{{route('magazine.edit',$magazine->id)}}">{{$magazine->title}}</a></td>
            <td><img height="50" src="{{$magazine->photo ? $magazine->photo->file : '/images/imgplaceholder.jpg'}}"></a></td>            
            <td>{{$magazine->file_download}}</td>
            <td>{{$magazine->count}}</td>
            
            <td>{{$magazine->created_at ? $magazine->created_at->diffForHumans():'-'}}</td>
            <td>{{$magazine->updated_at ? $magazine->updated_at->diffForHumans() : '-'}}</td>
        </tr>
            @endforeach
        @endif
    </tbody>
</table>


@stop