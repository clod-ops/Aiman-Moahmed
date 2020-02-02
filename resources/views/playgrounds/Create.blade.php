@extends('layouts.app')

@section('content')

<h2 style="margin-top: 12px;" class="text-center">Add Playground</a></h2>
<br>
 
<form action="{{ route('playgrounds.store') }}" method="POST" name="add_playground" enctype="multipart/form-data">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Playground Name</strong>
            <input type="text" name="name" class="form-control" placeholder="War Base">
            <span class="text-danger">{{ $errors->first('name') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Location</strong>
            <input type="text" name="location" class="form-control" placeholder="Iran">
            <span class="text-danger">{{ $errors->first('location') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Size</strong>
            <input type="text" class="form-control" name="size" placeholder="1-9999 ft">
            <span class="text-danger">{{ $errors->first('size') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Capacity</strong>
            <input type="text" class="form-control" name="capacity" placeholder="1-999 people">
            <span class="text-danger">{{ $errors->first('capacity') }}</span>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">
            <strong>Playground Image</strong><br>
                {{Form::file('cover_image')}}

                {{-- <a href="{{ route('upload') }}" class="btn btn-success mb-2">Upload Picture(s)</a>  --}}
        </div>
    </div>

    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection

{{-- @section('scripts')


@endsection --}}

