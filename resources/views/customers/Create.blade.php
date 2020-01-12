@extends('layouts.app')
 
@section('content')
<h2 style="margin-top: 12px;" class="text-center">Add Customer</a></h2>
<br>
 
<form action="{{ route('customers.store') }}" method="POST" name="add_customer">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>First Name</strong>
            <input type="text" name="first_name" class="form-control" placeholder="Donald">
            <span class="text-danger">{{ $errors->first('first_name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Last Name</strong>
            <input type="text" name="last_name" class="form-control" placeholder="Trump">
            <span class="text-danger">{{ $errors->first('last_name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Date of Birth</strong>
            <input type="text" class="form-control" name="date_of_birth" placeholder="2000-06-06">
            <span class="text-danger">{{ $errors->first('date_of_birth') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>User ID</strong>
            <input type="text" class="form-control" name="user_id" placeholder="6969">
            <span class="text-danger">{{ $errors->first('user_id') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection