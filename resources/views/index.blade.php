@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-lg-3 col-md-6 col-sm-12 my-3">
                <div class="card">
                    <div class="card-header alert alert-info"><b>Students Information</b></div>
                    <div class="card-body">
                        <div class="" role="alert">
                            <p>As an admin, you have full control over managing 
                            <a href="{{ route('students.list') }}">  students' information </a>
                            on this platform. You can:</p>
                            <ul>
                                <li>Add new students</li>
                                <li>Edit existing student details</li>
                                <li>Delete and</li>
                                <li>View information about students</li>
                            </ul>
                            <p>Empower yourself with the tools you need to streamline and organize student data efficiently.</p>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12  my-3">
                <div class="card">
                    <div class="card-header alert alert-info"><b>Courses Information</b></div>
                    <div class="card-body">
                    <div class="" role="alert">
                            <p>As an admin, you have full control over managing 
                                <a href="{{ route('batches.list') }}">courses' information </a>
                                on this platform. You can:</p>
                            <ul>
                                <li>Add new course</li>
                                <li>Edit existing courses' name</li>
                                <li>Delete and</li>
                                <li>View courses information</li>
                            </ul>
                            <p>Empower yourself with the tools you need to streamline and organize courses data efficiently.</p>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12  my-3">
                <div class="card">
                    <div class="card-header alert alert-info"><b> Schedules</b></div>
                    <div class="card-body">
                        <div class="" role="alert">
                            <p>As an admin, you have full control over managing 
                            <a href="{{ route('schedules.list') }}"> schedules information </a>
                            on this platform. You can:</p>
                            <ul>
                                <li>Add new schedule</li>
                                <li>Edit </li>
                                <li>Delete and</li>
                                <li>View courses information</li>
                            </ul>
                            <p>Empower yourself with the tools you need to streamline and organize schedules efficiently.</p>
                        </div>
                    </div>
                </div>
        </div>

        <div class="col-lg-3 col-md-6 col-sm-12  my-3">
                <div class="card">
                    <div class="card-header alert alert-info"><b>Attendance Records</b></div>
                    <div class="card-body">
                        <div class="" role="alert">
                            <p>As an admin, you have full control over managing
                            <a href="{{ route('attendances.list') }}">  attendance records</a>
                             on this platform. You can:</p>
                            <ul>
                                <li>Giving daily attendance records</li>
                                <li>Edit </li>
                                <li>Delete and</li>
                                <li>View daily students' attendance</li>
                            </ul>
                            <p>Empower yourself with the tools you need to streamline and organize student attendances efficiently.</p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
</div>
@endsection
