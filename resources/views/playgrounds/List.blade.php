@extends('layouts.app')
   
@section('content')
  <a href="{{ route('playgrounds.create') }}" class="btn btn-success mb-2">Add</a> 
  <br>
   <div class="row">
        <div class="col-12">
          
          <table class="table table-bordered" id="laravel_crud">
           <thead>
              <tr>
                 <th>Id</th>
                 <th>Name</th>
                 <th>Location</th>
                 <th>Size</th>
                 <th>Capacity</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($playgrounds as $playground)
              <tr>
                 <td>{{ $playground->id }}</td>
                 <td>{{ $playground->name }}</td>
                 <td>{{ $playground->location }}</td>
                 <td>{{ $playground->size }}</td>
                 <td>{{ $playground->capacity }}</td>
                 <td>{{ date('Y-m-d', strtotime($playground->created_at)) }}</td>
                 <td><a href="{{ route('playgrounds.edit',$playground->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('playgrounds.destroy', $playground->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $playgrounds->links() !!}
       </div> 
   </div>
 @endsection  