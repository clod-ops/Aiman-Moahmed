@extends('bookings.layout')
 
@section('content')
<h1 style="margin-top: 12px;" class="text-center">Add Booking</a></h1>
<br>
 
<form action="{{ route('bookings.store') }}" method="POST" name="add_booking">
{{ csrf_field() }}
 
<div class="row">
    <div class="col-md-12">
        <div class="form-group">
            <strong>Playground Name</strong>
            <select name="playground_id" id="playground_id" class="form-control">
                @foreach(\App\Playground::get() as $item)
                    <option value="{{$item->id}}">{{$item->name}}</option>
                @endforeach
            </select>
            <span class="text-danger">{{ $errors->first('playground_id') }}</span>
        </div>
    </div>
    {{-- Date&Time Picker --}}
    <div class="col-md-12">
        <div class="form-group">               
            <strong>Start Date</strong>
            <div class='input-group date' id='example1'>
                <input type='text' name="start_date" class="form-control" placeholder="YYYY/MM/DD">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">               
            <strong>Start Time </strong>
            <div class='input-group date' id='example2'>
                <input type='text' name="start_time" class="form-control" placeholder="HH:MM">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">               
            <strong>Finish Date</strong>
            <div class='input-group date' id='example3'>
                <input type='text' name="finish_date" class="form-control" placeholder="YYYY/MM/DD">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
    </div>
    <div class="col-md-12">
        <div class="form-group">               
            <strong>Finish Time</strong>
            <div class='input-group date' id='example4'>
                <input type='text' name="finish_time" class="form-control" placeholder="HH:MM">
                    <span class="input-group-addon">
                        <span class="glyphicon glyphicon-calendar"></span>
                    </span>
            </div>
        </div>
    </div>

    <script>
        $(function () {
              $('#example1').datetimepicker({
                format: 'YYYY/MM/DD',
                locale: 'en'
              });

              $('#example2').datetimepicker({
                format: 'HH:mm',
                locale: 'en'
              });

              $('#example3').datetimepicker({
                format: 'YYYY/MM/DD',
                locale: 'en'
              });

              $('#example4').datetimepicker({
                format: 'HH:mm',
                locale: 'en'
              });
        });
    </script>
    <div class="col-md-12">
        <button type="submit" class="btn btn-primary">Submit</button>
    </div>
</div>
 
</form>
@endsection