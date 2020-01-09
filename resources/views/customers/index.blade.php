@extends('layouts.app')

@section('content')

<div class="container">
    <div class="heading">
        Customers
    </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">First Name</th>
            <th scope="col">Last Name</th>
            <th scope="col">Date of Birth</th>
            <th scope="col">User ID</th>
          <th scope="col"><a href="{{ route('customers.create') }}" class="btn btn-success">Create</a></th>
          </tr>
        </thead>
        <tbody>
            @foreach ($customers as $customer)
                <tr>
                    <td>{{ $customer->id }}</td>
                    <td>{{ $customer->first_name }}</td>
                    <td>{{ $customer->last_name }}</td>
                    <td>{{ $customer->date_of_birth }}</td>
                    <td>{{ $customer->user_id }}</td>
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                            {{ csrf_field() }}
                            @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>  
            @endforeach
         
        </tbody>
      </table>
</div>
    
@endsection