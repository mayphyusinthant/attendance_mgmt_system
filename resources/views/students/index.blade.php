@extends('layouts.app')
@section('content')

    <div class = "row content-justify">
        <h2 class = "col-2">Student Lists</h2> 
        <a href="{{ route('students.add') }}" class = "col-3" >
            <span class = "btn btn-info"> Add New Student </span>
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
        <table class="table mx-auto ">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone Number</th>
                    <th>Batch </th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
            <tr>
                <td>{{  $student['name'] }} </td>
                <td>{{  $student['email'] }} </td>
                <td>{{  $student['phone_num'] }} </td>
                <td>{{  $student->batch->name }} </td>
                <td> 
                    <span class = "btn btn-info" onclick="window.location.href='{{ route('students.edit', ['id' => $student['id']]) }}) }}';"> Edit </span> 
                    <span class = "btn btn-info" onclick="window.location.href='{{ route('students.delete', ['id' => $student['id']]) }}) }}';">Delete</span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection