@extends('layouts.app')
@section('content')
    <div class = "row content-justify">
        <h2>Add New Schedule</h2> 
    </div>
    <div class = "container">
        <form method ="post" action="{{ route('schedules.store') }}">
            @csrf
            <div class = "form-group">
                <label>Name</label>
                <input type = "text" name = "name" class="form-control" required></input>

                <label>Open Time</label>
                <input type = "time" name = "open_time" class="form-control" required></input>

                <label>Close Time</label>
                <input type = "time" name = "close_time" class="form-control" required></input>
            </div>
            
            </div><br>
            <input type = "button" value = "Cancel" class = "btn btn-light" onclick="window.location.href='{{ route('schedules.list') }}';">
            <input type="submit" value = "Save" class = "btn btn-primary">
        </form>
    </div>
@endsection