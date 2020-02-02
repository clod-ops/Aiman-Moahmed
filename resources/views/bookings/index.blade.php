@extends('layouts.app')

@section('content')

<div class="container">
  <div class="heading">
      Bookings
  </div>
    <table class="table">
      <thead class="thead-dark">
        <tr>
          <th scope="col"></th>
          <th scope="col">#</th>
          <th scope="col">User Name</th>
          <th scope="col">Playground Name</th>
          <th scope="col">Start Date & Time</th>
          <th scope="col">Finish Date & Time</th>
        <th scope="col">
          @if(Auth::check())
            @can('Create')
            <a href="{{ route('bookings.create') }}" class="btn btn-success">Create</a></th>
            @endcan
          @endif
        </tr>
      </thead>
        <tbody>
          @if(Auth::User('id')->hasRole('Customer'))
            @foreach (Auth::User()->bookings as $booking)
              <tr>
                <td>
                <img src="/storage/cover_images/{{$booking->playground->cover_image}}">
                </td>
                <td> {{ $booking->id }}</td>
                <td> {{ $booking->user->name }}</td>
                <td> {{ $booking->playground->name }}</td>
                <td> {{ $booking->start_date_time }}</td>
                <td> {{ $booking->finish_date_time }}</td>
                
                    @if(Auth::check())
                      <form action="{{ route('bookings.destroy', $booking->id)}}" method="post">
                          @can('Edit')
                          <a href="{{ route('bookings.edit', $booking->id)}}" class="btn btn-primary">Edit</a>
                          @endcan
                        {{ csrf_field() }}
                        @method('DELETE')
                          @can('Delete')
                            <button type="submit" class="btn btn-danger">Delete</button>
                          @endcan
                      </form>
                    @endif
                  </td>
              </tr>
            @endforeach
          @elseif (Auth::User('id')->hasRole('Admin|User'))
            @foreach ($bookings as $booking)
                <tr>
                    <td>
                    <img src="/storage/cover_images/{{$booking->playground->cover_image}}">
                    </td>
                    <td><br><br>{{ $booking->id }}</td>
                    <td><br><br>{{ $booking->user->name }}</td>
                    <td><br><br>{{ $booking->playground->name }}</td>

                    <td><br><br> {{ Carbon\Carbon::parse($booking->start_date_time)->isoFormat('Do MMMM YYYY') }} 
                      <br>{{Carbon\Carbon::parse($booking->start_date_time)->isoFormat('h:mm A') }}
                      <br>({{Carbon\Carbon::parse($booking->start_date_time)->diffForHumans() }})</td>

                    <td><br><br> {{ Carbon\Carbon::parse($booking->finish_date_time)->isoFormat('Do MMMM YYYY') }} 
                      <br>{{Carbon\Carbon::parse($booking->finish_date_time)->isoFormat('h:mm A') }}</td>
                    <td>
                      @if(Auth::check())
                        <form action="{{ route('bookings.destroy', $booking->id)}}" method="post">
                          @can('Edit')<br>
                            <a href="{{ route('bookings.edit', $booking->id)}}" class="btn btn-primary">Edit</a><br><br>
                            @endcan
                            {{ csrf_field() }}
                            @method('DELETE')
                            @can('Delete')
                          <button type="submit" class="btn btn-danger">Delete</button>
                          @endcan
                        </form>
                      @endif
                    </td>
                </tr>
            @endforeach
          @endif

        </tbody>
      </table>
      {{ $bookings->links() }}
</div>

@endsection