@extends('layouts.app')

@section('content')

<div class="container">
    <div class="heading">
        Playgrounds
    </div>
    <table class="table">
        <thead class="thead-dark">
          <tr>
            <th scope="col">#</th>
            <th scope="col">Name</th>
            <th scope="col">Location</th>
            <th scope="col">Size (ft)</th>
            <th scope="col">Capacity (seating)</th>
            @if(Auth::check())
                @role('Admin|User')
                <th scope="col"><a href="{{ route('playgrounds.create') }}" class="btn btn-success">Create</a></th>
                @endrole
            @endif
          </tr>
        </thead>
        <tbody>
            @foreach ($playgrounds as $playground)
                <tr>
                    <td>{{ $playground->id }}</td>
                    <td>{{ $playground->name }}</td>
                    <td>{{ $playground->location }}</td>
                    <td>{{ $playground->size }}</td>
                    <td>{{ $playground->capacity }}</td>
                    @if(Auth::check())
                    <td>
                        <form action="{{ route('playgrounds.destroy', $playground->id)}}" method="post">
                            @can('Edit')
                            <a href="{{ route('playgrounds.edit', $playground->id) }}" class="btn btn-primary">Edit</a>
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
      {{ $playgrounds->links() }}
</div>

@endsection