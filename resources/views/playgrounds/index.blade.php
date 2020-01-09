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
            <th scope="col">Size</th>
            <th scope="col">Capacity</th>
          <th scope="col"><a href="{{ route('playgrounds.create') }}" class="btn btn-success">Create</a></th>
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
                    <td>
                        <form action="{{ route('playgrounds.destroy', $playground->id)}}" method="post">
                            <a href="{{ route('playgrounds.edit', $playground->id) }}" class="btn btn-primary">Edit</a>
                            {{ csrf_field() }}
                            @method('DELETE')
                       <button type="submit" class="btn btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>  
            @endforeach
         
        </tbody>
      </table>
      {{ $playgrounds->links() }}
</div>

@endsection