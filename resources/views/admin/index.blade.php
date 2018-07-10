@extends('layouts.admin')

@section('content')
<h1 class="page-header">HOME PAGE1</h1>


<div class="container">
    <table class="table">
    <thead>
        <tr>
            <th>Id</th>
            <th>Name</th>
            <th>Phone</th>
            <th>category</th>
            <th>Booking_Date</th>
            <th>Body</th>
            <th>created_at</th>
             <th>Active</th>
        </tr>
    </thead>
    <tbody>
        @if($bookings)
            @foreach($bookings as $booking) 
        <tr>
            <td>{{$booking->id}}</td>
            <td>{{$booking->name}}</td>
            <td>{{$booking->phone}}</td>
            <td>{{$booking->category->name}}</td>
            <td>{{$booking->booking_date}}</td>
            <td>{{$booking->body ? $booking->body : '-'}}</td>
            <td>{{$booking->created_at ? $booking->created_at->diffForHumans():'-'}}</td>

           <td>
                @if($booking->is_active == 1)
                        
                    {!! Form::open(['method'=>'PATCH','action'=> ['AdminBookingController@update', $booking->id ]])!!}

                        <input type="hidden" name="is_active" value="0">

                        <div class="form-group">
                                {!! Form::submit('Un-approve',['class' => 'btn btn-success'])!!}
                            </div>
                        {!! Form::close()!!}
                    
                    @else 
                    
                        {!! Form::open(['method'=>'PATCH','action'=> ['AdminBookingController@update', $booking->id ]])!!}
                      
                        <input type="hidden" name="is_active" value="1">
                       
                        <div class="form-group">
                            {!! Form::submit('approve',['class' => 'btn btn-info'])!!}
                        </div>
                        {!! Form::close()!!}
                    @endif
                 </td>
                 <td>
                    {!! Form::open(['method'=>'DELETE','action'=> ['AdminBookingController@destroy', $booking->id ]])!!}
                        
                        <div class="form-group">
                            {!! Form::submit('delete',['class' => 'btn btn-danger'])!!}
                        </div>
                        
                    {!! Form::close()!!}
                </td>
            
        </tr>
            @endforeach
        @endif
    </tbody>
</table>
  
    

        
                
         
</div>




@stop