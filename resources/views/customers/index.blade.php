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
            @if(Auth::check())
                @can('Create')
                <th scope="col"><a href="{{ route('customers.create') }}" class="btn btn-success">Create</a></th>
                @endcan
            @endif
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
                    @if(Auth::check())
                    <td>
                        <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                            @can('Edit')
                            <a href="{{ route('customers.edit', $customer->id) }}" class="btn btn-primary">Edit</a>
                            @endcan
                            {{ csrf_field() }}
                            @method('DELETE')
                            @can('Delete')
                       <button type="submit" class="btn btn-danger">Delete</button>
                       @endcan
                        </form>
                    </td>
                    @endif
                </tr>  
            @endforeach
        </tbody>
      </table>
      {{ $customers->links() }}
</div>
@endsection