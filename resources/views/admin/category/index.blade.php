@extends('layouts.admin')

@section('content')

<!--//show sesion flash-->
@if(Session::has('delete_category'))

<p class="bg-danger">{{session('delete_category')}}</p>

@endif

<h1 class="page-header">Category</h1>

<div class="col-sm-6">
    {!! Form::open(['method'=>'POST','action'=>'AdminCategoryController@store'])!!}
    <div class="form-group">
        {!! Form::label('name','Name')!!}
        {!! Form::text('name',null,['class'=>'form-control'])!!}       
    </div>
     <input type="hidden" name="is_active" value="1">
    <div class="form-group">
        {!! Form::submit('Create Category',['class' => 'btn btn-primary'])!!}
    </div>
    {!! Form::close()!!}
</div>

<div class="col-sm-6">
    <table class="table">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>created_at</th>
                <th>action</th>

            </tr>
        </thead>
        <tbody>
            @if($categories)           
            @foreach($categories as $category)       
            <tr>
                <td>{{$category->id}}</td>
                <td><a href="{{route('category.edit',$category->id)}}">{{$category->name}}</a></td>
                <td>{{$category->created_at ? $category->created_at->diffForHumans() : '-'}}</td>
                <td>
                    {!! Form::open(['method'=>'DELETE','action'=>['AdminCategoryController@destroy',$category->id] ])!!}
                    
                        {!! Form::submit('detete',['class' => 'btn btn-danger'])!!}
                        
                    {!! Form::close()!!}

                </td>
            </tr>
            @endforeach
            @endif
        </tbody>
    </table>   
</div>     
@stop