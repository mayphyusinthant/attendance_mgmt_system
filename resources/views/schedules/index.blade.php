@extends('layouts.app')
@section('content')

    <div class = "row content-justify">
        <h2 class = "col-2">Schedule Lists</h2> 
        <a href="{{ route('schedules.add') }}" class = "col-3" >
            <span class = "btn btn-info"> Add New Schedule </span>
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
                    <th>Open Time</th>
                    <th>Close Time</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($schedules as $schedule)
            <tr>
                <td>{{  $schedule['name'] }} </td>
                <td>{{  $schedule['open_time'] }} </td>
                <td>{{  $schedule['close_time'] }} </td>

                
                <td> 
                    <span class = "btn btn-info" onclick="window.location.href='{{ route('schedules.edit', ['id' => $schedule['id']]) }}) }}';"> Edit </span> 
                    <span class = "btn btn-info" onclick="window.location.href='{{ route('schedules.delete', ['id' => $schedule['id']]) }}) }}';">Delete</span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection