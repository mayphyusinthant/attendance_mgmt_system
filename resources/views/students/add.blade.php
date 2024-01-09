@extends('layouts.app')
@section('content')
    <div class = "row content-justify">
        <h2>Add New Student</h2> 
    </div>
    <div class = "container">
        <form method ="post" action="{{ route('students.store') }}">
            @csrf
            <div class = "form-group">
                <label>Name</label>
                <input type = "text" name = "name" class="form-control" required></input>
            </div>
            <div class = "form-group">
                <label>Email</label>
                <input type = "email" name = "email" class="form-control" required></input>
            </div>
            <div class = "form-group">
                <label>Phone Number</label>
                <input type = "text" name = "phone_num" class="form-control" required></input>
            </div>
            <div class = "form-group" required>
                <label>Batch</label>
                <select class = "form-control" name = "class_id">
                    @foreach($batches as $batch)
                        <option value = "{{ $batch['id'] }}">
                            {{ $batch['name'] }}
                        </option>
                    @endforeach
                </select>
            </div><br>
            <input type = "button" value = "Cancel" class = "btn btn-light" onclick="window.location.href='{{ route('students.list') }}';">
            <input type="submit" value = "Save" class = "btn btn-primary">
        </form>
    </div>
@endsection