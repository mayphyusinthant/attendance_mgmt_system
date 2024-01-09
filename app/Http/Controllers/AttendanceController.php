<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Attendance;
use Carbon\Carbon;



use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(Request $request){
        // Check if a date is provided in the request
        if ($request->has('date')) {
            // Form submitted with a specific date
            $attendances = Attendance::whereDate('attendance_date', $request->date)->get();
            // Filter out absentees and presenteeism based on the attendance status
            $absentees = $attendances->where('status', 'absent');
            $absenteeCount = $absentees->count();

            $presenteeism  = $attendances->where('status', 'present');
            $presenteeCount = $presenteeism->count();

            return view('attendances.index', [
                'attendances' => $attendances,
                'absentee' => $absenteeCount,
                'presentee' => $presenteeCount,
            ]);
        } else {
            // No date provided in the request, use the default date (today)
            $attendances = Attendance::whereDate('attendance_date', date('Y-m-d'))->get();
            return view('attendances.index', [
                'attendances' => $attendances,
            ]);
        }
    
    }
    

    public function createAll(Request $request)
    {
        $attendanceDate = Carbon::now()->toDateString(); 
        $status = 'absent';

        $students = Student::all();

        foreach ($students as $student) {
            Attendance::create([
                'student_id' => $student->id,
                'attendance_date' => $attendanceDate,
                'status' => $status,
                'updated_at' => '2024-01-05 00:00:00',
            ]);

        }

        return redirect()->route('attendances.list')->with('info', 'Attendance records created successfully.');
    }


    public function update(Request $request, $id){

        $attendance_date = $request->input('attendance_date');
        $stu_id = $request->input('student_id');

        // Retrieve the original record
        $attendance = Attendance::where('student_id', $stu_id)
            ->where('attendance_date', $attendance_date)
            ->first();
    
        $created_at = $attendance->created_at;
    
        Attendance::updateOrInsert(
            ['student_id' => $stu_id, 'attendance_date' => $attendance_date],
            ['status' => 'present', 'updated_at' => now(), 'created_at' => $created_at]
        );
    
        $attendances = Attendance::whereDate('attendance_date', $attendance_date)->get();

        // Filter out absentees and presenteeism based on the attendance status
        $absentees = $attendances->where('status', 'absent');
        $absenteeCount = $absentees->count();
    
        $presenteeism  = $attendances->where('status', 'present');
        $presenteeCount = $presenteeism->count();
    
        return view('attendances.index', [
            'attendances' => $attendances,
            'absentee' => $absenteeCount,
            'presentee' => $presenteeCount,
        ])
        ->with('info', "Attendance record updated for Student ID: {$stu_id} on Date: {$attendance_date}");

        
            
    }
    

    public function undo(Request $request, $id){

        $attendance_date = $request->input('attendance_date');
        $stu_id = $request->input('student_id');

        // Retrieve the original record
        $attendance = Attendance::where('student_id', $stu_id)
        ->where('attendance_date', $attendance_date)
        ->first();

        $created_at = $attendance->created_at;
        $updated_at = $attendance->updated_at->format('Y-m-d') . ' 00:00:00';
        Attendance::updateOrInsert(
            ['student_id' => $stu_id, 'attendance_date' => $attendance_date],
            ['status' => 'absent', 'updated_at' => $updated_at, 'created_at' => $created_at]
        );
        $attendance_date = '2024-01-01';
        $attendances = Attendance::whereDate('attendance_date', '2024-01-01')->get();

        // Filter out absentees and presenteeism based on the attendance status
        $absentees = $attendances->where('status', 'absent');
        $absenteeCount = $absentees->count();

        $presenteeism  = $attendances->where('status', 'present');
        $presenteeCount = $presenteeism->count();

        return view('attendances.index', [
            'attendances' => $attendances,
            'absentee' => $absenteeCount,
            'presentee' => $presenteeCount,
        ])
        ->with('info', "Attendance record undo for Student ID: {$stu_id} on Date: {$attendance_date}");

    }
}
