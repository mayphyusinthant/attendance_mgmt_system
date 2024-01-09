@extends('layouts.app')
@section('content')
    <div class = "row content-justify">
        <h2>Edit Batch Information</h2> 
    </div>
    <div class = "container">
        <form method="post" action="{{ route('batches.update', ['id' => $batch->id]) }}">
            @csrf
            <div class = "form-group">
                <label>Name</label>
                <input type = "text" name = "name" class="form-control" required></input>
            </div>
            <div class = "form-group" required>
                <label>Schedule</label>
                <select class = "form-control" name = "schedule_id">
                    @foreach($schedules as $schedule)
                        <option value = "{{ $schedule['id'] }}">
                            {{ $schedule['name'] }}
                        </option>
                    @endforeach
                </select>
            </div>
            <br>
            <input type = "button" value = "Cancel" class = "btn btn-light" onclick="window.location.href='{{ route('batches.list') }}';">
            <input type="submit" value = "Save" class = "btn btn-primary">
        </form>
    </div>
@endsection