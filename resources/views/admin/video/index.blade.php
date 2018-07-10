@extends('layouts.admin')

@section('content')

<!--//show sesion flash-->
@if(Session::has('delete_video'))

<p class="bg-danger">{{session('delete_video')}}</p>

@endif



<h1 class="page-header">VIDEOS</h1>
<!--link convert video-->
<!--https://embed.ly/code?url=https%3A%2F%2Fwww.youtube.com%2Fwatch%3Fv%3DrRZR3nsiIeA-->


<table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>title</th>
           
            <th>link</th>
            <th>create_at</th>
            <th>update_at</th>
        </tr>
    </thead>
    <tbody>
        @if($videos)
        @foreach($videos as $video)
        <tr>
            <td>{{$video->id}}</td>

            <td><a href="{{route('video.edit',$video->id)}}">{{$video->title}}</a></td>

            
            <td>
                <iframe width="420" height="345" src="{{$video->body}}">
                </iframe>
                
                <!--  use framework
                    <a class="embedly-card" data-card-controls="0" href="{{$video->body}}"></a>
                    <script async src="//cdn.embedly.com/widgets/platform.js" charset="UTF-8"></script>
                -->
            </td>


            <td>{{$video->created_at ? $video->created_at->diffForHumans():'-'}}</td>
            <td>{{$video->updated_at ? $video->updated_at->diffForHumans() : '-'}}</td>
        </tr>
        @endforeach
        @endif
    </tbody>
</table>


@stop