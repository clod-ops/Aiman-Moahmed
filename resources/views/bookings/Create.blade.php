@extends('layouts.layout')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Booking</a></h2>
<br>
 
<form action="{{ route('bookings.store') }}" method="POST" name="add_booking">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Playground ID</strong>
            <select name="playground_id" id="playground_id" class="form-control">
                @foreach(\App\Playground::get() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('playground_id') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date & Time</strong>
            <input type="text" name="time" class="form-control" placeholder="YYYY-MM-DD HH-MM-SS">
            <span class="text-danger">{{ $errors->first('time') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection