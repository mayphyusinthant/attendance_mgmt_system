<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('batches', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('schedule');
            $table->timestamps();
        });
    }

    public function add(){

        $validator = validator(request()->all(), [
            'name' => 'required',
            'schedule' => 'required',
        ]);

        if($validator->fails){
            return back()->withErrors($validator);
        }
        
        $batch = new Batch;
        $batch->name = request()->name;
        $student->save();

        return redirect('/batches');
    }
    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('batches');
    }
};
