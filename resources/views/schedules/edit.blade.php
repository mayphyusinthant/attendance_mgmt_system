@extends('layouts.app')
@section('content')
    <div class = "row content-justify">
        <h2>Edit Schedule Information</h2> 
    </div>
    <div class = "container">
        <form method="post" action="{{ route('schedules.update', ['id' => $schedule->id]) }}">
            @csrf
            <div class = "form-group">
                <label>Name</label>
                <input type = "text" name = "name" class="form-control" placeholder = '{{ $schedule->name}}' required></input>
            </div>
            <div class = "form-group">
                <label>Open Time</label>
                <input type = "time" name = "open_time" class="form-control"  required></input>
            </div>
            <div class = "form-group">
                <label>Close Time</label>
                <input type = "time" name = "close_time" class="form-control"  required></input>
            </div>
            <br>
            <input type = "button" value = "Cancel" class = "btn btn-light" onclick="window.location.href='{{ route('schedules.list') }}';">
            <input type="submit" value = "Save" class = "btn btn-primary">
        </form>
    </div>
@endsection