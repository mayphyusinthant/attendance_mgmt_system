<?php

namespace App\Http\Controllers;
use App\Models\Batch;
use App\Models\Schedule;


use Illuminate\Http\Request;

class BatchController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $data = Batch::with('schedule')->get();

        return view('batches/index', [
            'batches' => $data
        ]);
    }

    public function add(){
        $batch_data = Batch::all();
        $schedule_data = Schedule::all();
        // Render the view with batch data
        return view('batches/add', [
            'schedules' => $schedule_data
        ]);
    }
    
    public function store(Request $request){

        $batch = new Batch;
        $batch->name = $request->name;  // Corrected form input name
        $batch->schedule_id = $request->schedule_id;  // Corrected form input name
        $batch->save();

        return redirect('/batches')->with('info', 'New Batch Added.');
    }

    public function edit($id){

        $batch = Batch::find($id);
        if(!$batch){
            return redirect("/batches")->with('error', 'Batch not found.');
        }
        $schedule_data = Schedule::all();

        return view('batches.edit', ['schedules' => $schedule_data, 'batch' => $batch]);

    }

    public function update(Request $request, $id){

        $batch = Batch::find($id);
        if(!$batch){
            return redirect("/batches")->with('error', 'Batch not found.');
        }
        $batch->name = $request->name;  // Corrected form input name
        $batch->schedule_id = $request->schedule_id;  // Corrected form input name
        $batch->save();

        return redirect('/batches')->with('info', 'Batch information updated successfully');

    }

    public function delete($id){
        $batch = Batch::find($id);
        if(!$batch){
            return redirect("/batches")->with('error', 'Batch not found.');
        }
        $batch->delete();
        return redirect('/batches')->with('info', "Batch Id {$batch->id} : {$batch->name} Deleted.");
    }
}
