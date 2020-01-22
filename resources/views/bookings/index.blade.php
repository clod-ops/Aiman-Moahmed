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
            {{-- @foreach ($bookings as $booking) --}}
              <tr>
                <td> {{ Auth::user()->id }}</td>
                <td> {{ Auth::user()->name }}</td>
                <td> {{ Auth::user()->playgrounds }}</td>
                <td> {{ Auth::user()->start_date_time }}</td>
                <td> {{ Auth::user()->finish_date_time }}</td>
                    {{-- @if(Auth::check())
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
                    @endif --}}
                  </td>
              </tr>
            {{-- @endforeach --}}
          @elseif (Auth::User('id')->hasRole('Admin|User'))
            @foreach ($bookings as $booking)
                <tr>
                    <td>{{ $booking->id }}</td>
                    <td>{{ $booking->user->name }}</td>
                    <td>{{ $booking->playground->name }}</td>
                    <td>{{ $booking->start_date_time }}</td>
                    <td>{{ $booking->finish_date_time }}</td>
                    <td>
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
          @endif

        </tbody>
      </table>
      {{ $bookings->links() }}
</div>

@endsection