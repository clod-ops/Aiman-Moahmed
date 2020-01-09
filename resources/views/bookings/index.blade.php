@extends('layouts.app')

@section('content')

<div class="container">
    <div class="heading">
        Bookings
    </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">User ID</th>
            <th scope="col">Playground ID</th>
            <th scope="col">Date & Time</th>
          <th scope="col">
            @if(Auth::check())
            <a href="{{ route('bookings.create') }}" class="btn btn-success">Create</a></th>
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->playground->name }}</td>
                    <td>{{ $booking->time }}</td>
                    <td>
                        
                        <form action="{{ route('bookings.destroy', $booking->id)}}" method="post">
                            <a href="{{ route('bookings.edit', $booking->id) }}" class="btn btn-primary">Edit</a>
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