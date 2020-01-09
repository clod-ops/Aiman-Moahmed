@extends('layouts.layout')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Playground</a></h2>
<br>
 
<form action="{{ route('playgrounds.update', $playground_info->id) }}" method="POST" name="update_playground">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Name</strong>
            <input type="text" name="name" class="form-control" placeholder="Enter New Playground Name" value="{{ $playground_info->name }}">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Location</strong>
            <input type="text" name="location" class="form-control" placeholder="Enter New Location" value="{{ $playground_info->location }}">
            <span class="text-danger">{{ $errors->first('location') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Size</strong>
            <input type="text" name="size" class="form-control" placeholder="Enter New Size" value="{{ $playground_info->size }}">
            <span class="text-danger">{{ $errors->first('size') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Capacity</strong>
            <input type="text" name="capacity" class="form-control" placeholder="Enter New Capacity" value="{{ $playground_info->capacity }}">
            <span class="text-danger">{{ $errors->first('capacity') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection