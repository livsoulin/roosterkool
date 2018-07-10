@extends('layouts.admin')

@section('content')

@if(Session::has('delete_album'))

<p class="bg-danger">{{session('delete_album')}}</p>

@endif

<h1 class="page-header">Photo</h1>
@if($titles)
<table class="table">
    <thead>
        <tr>
           
            <th>Id</th>
            <th>Title *(update)</th>
            <th>category</th>
            <th>View Images</th>
            <th>Created_at</th>
            
            
        </tr>
    </thead>
    <tbody>
        @foreach($titles as $title)
        <tr>
            
            <td>{{$title->id}}</td>
            <td><a href="{{route('album.edit',$title->id)}}">{{$title->name}}</a></td>
            <td>{{$title->category->name}}</td>
             <td><a href="{{route('album.show',$title->id)}}">View-images</a></td>
            <td>{{$title->created_at ? $title->created_at->diffForHumans() :'-'}}</td>
           
           
        </tr>
        @endforeach
    </tbody>
</table>



@endif
@stop

@section('scripts')
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