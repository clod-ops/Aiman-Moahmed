@extends('layouts.layout')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Edit Customers</a></h2>
<br>
 
<form action="{{ route('customers.update', $customer_info->id) }}" method="POST" name="update_customer">
{{ csrf_field() }}
@method('PATCH')
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>First Name</strong>
            <input type="text" name="first_name" class="form-control" placeholder="Enter New First Name" value="{{ $customer_info->first_name }}">
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Last Name</strong>
            <input type="text" name="last_name" class="form-control" placeholder="Enter Last Name" value="{{ $customer_info->last_name }}">
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date of Birth</strong>
            <input type="text" name="date_of_birth" class="form-control" placeholder="Enter New Date of Birth" value="{{ $customer_info->date_of_birth }}">
            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>User ID</strong>
            <input type="text" name="user_id" class="form-control" placeholder="Enter New User ID" value="{{ $customer_info->user_id }}">
            <span class="text-danger">{{ $errors->first('user_id') }}</span>
        </div>
    </div>
    
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection