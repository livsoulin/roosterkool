@extends('layouts.admin')

@section('content')

<!--//show sesion flash-->
@if(Session::has('create_logo'))

<p class="bg-primary">{{session('create_logo')}}</p>

@endif

 <h1 class="page-header">LOGO</h1>

<div class="col-sm-6">
    {!! Form::open(['method'=>'POST','action'=>'AdminLogoController@store','files' => true])!!}

    <div class="form-group">
        {!! Form::label('name','Photo:')!!}
        {!! Form::file('name',null,['class'=>'form-control'])!!} 
    </div>
    <div class="form-group">
        {!! Form::submit('Create Logo',['class' => 'btn btn-primary'])!!}
        <p>Add image Logo one by one!!!</p>
        
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

            {!! Form::open(['method'=>'POST','action'=>'AdminLogoController@updatelogo','class'=>'form-inline'])!!}

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
                        <div class="btn bg-danger"><a href="/admin/delete/logo/{{$photo->id}}">delete</a></div>
                        
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


