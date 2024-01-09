<?php

namespace App\Http\Controllers;
use App\Models\Student;
use App\Models\Batch;

use Illuminate\Http\Request;

class StudentController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $data = Student::all();

        return view('students/index', [
            'students' => $data
        ]);
    }

    public function add(){
        $batch_data = Batch::all();
        // Render the view with batch data
        return view('students/add', [
            'batches' => $batch_data
        ]);
    }
    
    public function store(Request $request){

        $student = new Student;
        $student->name = $request->name;  // Corrected form input name
        $student->email = $request->email;
        $student->phone_num = $request->phone_num;
        $student->batch_id = $request->class_id;  // Corrected form input name
        $student->save();

        return redirect('/students')->with('info', 'New Student Added.');
    }

    public function edit($id){

        $student = Student::find($id);
        if(!$student){
            return redirect("/students")->with('error', 'Student not found.');
        }
        $batch_data = Batch::all();

        return view('students.edit', ['student' => $student], [ 'batches' => $batch_data]);

    }

    public function update(Request $request, $id){

        $student = Student::find($id);
        if(!$student){
            return redirect("/students")->with('error', 'Student not found.');
        }
        $student->name = $request->name;  // Corrected form input name
        $student->email = $request->email;
        $student->phone_num = $request->phone_num;
        $student->batch_id = $request->class_id;  // Corrected form input name
        $student->save();

        return redirect('/students')->with('info', 'Student information updated successfully');

    }

    public function delete($id){
        $student = Student::find($id);
        if(!$student){
            return redirect("/students")->with('error', 'Student not found.');
        }
        $student->delete();
        return redirect('/students')->with('info', "Student Id {$student->id} : {$student->name} student Deleted.");
    }
}
