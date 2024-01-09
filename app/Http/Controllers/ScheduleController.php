<?php

namespace App\Http\Controllers;
use App\Models\Schedule;

use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index(){
        $data = Schedule::all();

        return view('schedules/index', [
            'schedules' => $data
        ]);
    }

    public function add(){
        $data = Schedule::all();
        // Render the view with batch data
        return view('schedules/add', [
            'schedules' => $data
        ]);
    }
    
    public function store(Request $request){

        $schedule = new Schedule;
        $schedule->name = $request->name;  // Corrected form input name
        $schedule->open_time = $request->open_time;
        $schedule->close_time = $request->close_time;
        $schedule->save();

        return redirect('/schedules')->with('info', 'New Schedule Added.');
    }

    public function edit($id){

        $schedule = Schedule::find($id);
        if(!$schedule){
            return redirect("/schedules")->with('error', 'Schedule not found.');
        }

        return view('schedules.edit', [ 'schedule' => $schedule]);

    }

    public function update(Request $request, $id){

        $schedule = Schedule::find($id);
        if(!$schedule){
            return redirect("/schedules")->with('error', 'Schedule not found.');
        }
        $schedule->name = $request->name;  // Corrected form input name
        $schedule->open_time = $request->open_time;
        $schedule->close_time = $request->close_time;
        $schedule->save();

        return redirect('/schedules')->with('info', 'Schedule information updated successfully');

    }

    public function delete($id){
        $schedule = Schedule::find($id);
        if(!$schedule){
            return redirect("/schedules")->with('error', 'Schedule not found.');
        }
        $schedule->delete();
        return redirect('/schedules')->with('info', "Schedule Id {$schedule->id} : {$schedule->name} Deleted.");
    }
}
