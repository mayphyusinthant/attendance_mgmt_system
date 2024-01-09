@extends('layouts.app')
@section('content')

    <div class = "row content-justify">
        <h2 class = "col-2">Batch Lists</h2> 
        <a href="{{ route('batches.add') }}" class = "col-3" >
            <span class = "btn btn-info"> Add New Batch </span>
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
                    <th>Schedule</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            @foreach ($batches as $batch)
            <tr>
                <td>{{  $batch['name'] }} </td>
                <td>{{  optional($batch->schedule)->name }} </td>
                <td> 
                    <span class = "btn btn-info" onclick="window.location.href='{{ route('batches.edit', ['id' => $batch['id']]) }}) }}';"> Edit </span> 
                    <span class = "btn btn-info" onclick="window.location.href='{{ route('batches.delete', ['id' => $batch['id']]) }}) }}';">Delete</span></td>
            </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection