@extends('layouts.admin')

@section('content')

<!--//show sesion flash-->
@if(Session::has('create_cover'))

<p class="bg-primary">{{session('create_cover')}}</p>

@endif

<h1 class="page-header">Cover</h1>

<!--@foreach($users as $i => $user) 

    
    {{$i}}
    {{$user['id']}}
   

@endforeach-->

<div class="col-sm-6">
    {!! Form::open(['method'=>'POST','action'=>'AdminCoverTopController@store','files' => true])!!}

    <div class="form-group">
        {!! Form::label('name','Photo')!!}
        {!! Form::file('name',null,['class'=>'form-control'])!!} 
    </div>

    

    <div class="form-group">
        {!! Form::submit('Create Cover',['class' => 'btn btn-primary'])!!}
        
    </div>
    {!! Form::close()!!}
</div>

<div class="col-sm-6">
    <table class="table">
        <thead>
            <tr>
                <th>choose</th>
                <th>ID</th>
                <th>Name</th>
                <th>created_at</th>
                <th>action</th>

            </tr>
        </thead>
        <tbody>

        @if($photos)  

            {!! Form::open(['method'=>'POST','action'=>'AdminCoverTopController@updatecovertop','class'=>'form-inline'])!!}

            <div class="form-group">
                 <input type="submit" name="updatedata" value="Select" class="btn bg-primary">
                 
            </div>

        @foreach($photos as $photo)
            <tr>
                
                <td><input type="radio" name="id" value="{{ $photo->id }}" {{ $photo->is_active === 1 ? "checked=checked" : "" }}></td>
                <td>{{$photo->id}}</td>
                <td> <img src="{{$photo->photo ? $photo->photo->file : '/images/imgplaceholder.jpg'}}" class="img-responsive img-rounded"></td>
                <td>{{$photo->created_at ? $photo->created_at->diffForHumans() : '-'}}</td>
                <td>
                    
                    <div class="form-group">
                        <div class="btn bg-danger"><a href="/admin/delete/covertop/{{$photo->id}}">delete</a></div>
                        
                    </div>
                </td>
            </tr>
        @endforeach
        
        {!! Form::close()!!}
        
        @endif
        </tbody>
    </table>   
</div>     
@stop


