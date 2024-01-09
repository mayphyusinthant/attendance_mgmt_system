@extends('layouts.app')
@section('content')

    <div class = "row content-justify">
        <h2 class = "col-3">Attendance Lists</h2> 
        <a href="{{ route('attendances.createAll') }}" class = "col-3" >
            <span class = "btn btn-info"> Add New Attendance </span>
        </a>
    </div>
    @if(session('error'))
        <div class = "alert alert-danger" id = "alert-msg">
            {{ session('error')}}
        </div>
    @endif

    
    @if(session('info'))
        <div class = "alert alert-info" id = "alert-msg">
            {{ session('info')}}
        </div>
    @endif

    <script>
        setTimeout(function() {
            document.getElementById('alert-msg').style.display = 'none';
        }, 5000); // 5000 milliseconds (5 seconds)
    </script>

    <div class = "mx-auto">
        @if(session()->has('absenteeCount') && session()->has('presenteeCount'))
            <p>Total Absent - {{ session('absenteeCount') }}</p>  
            <p>Total Present - {{ session('presenteeCount') }}</p>  
        @elseif(isset($absentee) && isset($presentee))
            <p>Total Absent - {{ $absentee }}</p>  
            <p>Total Present - {{ $presentee }}</p> 
        @else
            <p>No data available.</p>
        @endif
        <b>Attendance Records </b> 
        <form action="{{ route('attendances.list') }}" method="POST">
            @csrf
            <input type="date" name="date" value="">
            <input type="submit" value = "Search" class = "btn btn-info">
        </form> 
        <table class="table mx-auto ">
            <thead>
                <tr>
                    <th>Student Name</th>
                    <th>Batch</th>
                    <th>Status</th>
                    <th>Arrival Time</th>
                    <th>Created At</th>
                    <th>Give Attendance</th>
                </tr>
            </thead>
            <tbody>
            @forelse ($attendances as $attendance)
            <tr>
                <td>{{  $attendance->student->name }} </td>
                <td>{{  $attendance->student->batch->name }} </td>
                <td>{{  $attendance->status }}
                <td>{{  $attendance->updated_at->format('H:i:s')}} </td>
                <td>{{  $attendance->created_at }} </td>
                <td>
                    @if($attendance->status =='absent')
                    <form action="{{ route('attendances.update', ['id' => $attendance->student_id, 'attendance_date' =>$attendance->attendance_date]) }}" method="POST" class="give-attendance-form">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $attendance->student_id }}">
                        <input type="hidden" name="attendance_date" value="{{ $attendance->attendance_date }}">
                        <input type="hidden" name="updated_at" value="{{ now() }}">

                        <button type="submit" class="btn btn-info">Give Attendance</button>
                    </form>
                    @else
                    <form action="{{ route('attendances.undo', ['student_id' => $attendance->student_id, 'attendance_date' => $attendance->attendance_date]) }}" method="POST">
                        @csrf
                        <input type="hidden" name="student_id" value="{{ $attendance->student_id }}">
                        <input type="hidden" name="attendance_date" value="{{ $attendance->attendance_date }}">
                        <input type="hidden" name="updated_at" value="{{ now() }}">

                        <button type="submit" class="btn btn-danger">Undo</button>
                    </form> 
                    @endif
                </td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection