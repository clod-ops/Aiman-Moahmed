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
                 <th>First Name</th>
                 <th>Last Name</th>
                 <th>Date of Birth</th>
                 <th>User ID</th>
                 <td colspan="2">Action</td>
              </tr>
           </thead>
           <tbody>
              @foreach($customers as $customer)
              <tr>
                 <td>{{ $customer->id }}</td>
                 <td>{{ $customer->name }}</td>
                 <td>{{ $customer->location }}</td>
                 <td>{{ $customer->size }}</td>
                 <td>{{ $customer->capacity }}</td>
                 <td>{{ date('Y-m-d', strtotime($playground->created_at)) }}</td>
                 <td><a href="{{ route('customers.edit',$customer->id)}}" class="btn btn-primary">Edit</a></td>
                 <td>
                 <form action="{{ route('customers.destroy', $customer->id)}}" method="post">
                  {{ csrf_field() }}
                  @method('DELETE')
                  <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                </td>
              </tr>
              @endforeach
           </tbody>
          </table>
          {!! $customers->links() !!}
       </div> 
   </div>
 @endsection  