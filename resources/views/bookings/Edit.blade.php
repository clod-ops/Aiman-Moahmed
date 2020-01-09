@extends('layouts.layout')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Booking</a></h2>
<br>
 
<form action="{{ route('bookings.update', $booking_info->id) }}" method="POST" name="update_booking">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>User ID</strong>
            <input type="text" name="user_id" class="form-control" placeholder="Enter New User ID" value="{{ $booking_info->user_id }}">
            <span class="text-danger">{{ $errors->first('user_id') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Playground ID</strong>
            <input type="text" name="playground_id" class="form-control" placeholder="Enter New Playground ID" value="{{ $booking_info->playground_id }}">
            <span class="text-danger">{{ $errors->first('playground_id') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date & Time</strong>
            <textarea class="form-control" col="4" name="time" placeholder="Enter New Date & Time" >{{ $booking_info->time }}</textarea>
            <span class="text-danger">{{ $errors->first('time') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection