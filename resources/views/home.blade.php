@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    {{$role = auth()->user()->getRoleNames()}}
                    You are logged in!
                    <br><br><a href="{{ route('playgrounds.index') }}" class="btn btn-success mb-2">Go to Playgrounds</a> 
                    <a href="{{ route('customers.index') }}" class="btn btn-success mb-2">Go to Customers</a> 
                    <a href="{{ route('bookings.index') }}" class="btn btn-success mb-2">Go to Bookings</a> 
                    
                    <br><br>
                    <h4>Permissions*</h4>
                 
                    <ul>
                        <li>Admin - Create/Edit/Delete </li>
                        <li>User(Employee) - Edit/Delete </li>
                        <li>Customer - Create </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
        
</div>

@endsection
