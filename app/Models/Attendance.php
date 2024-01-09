<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    use HasFactory;
    protected $fillable = [
        'student_id',
        'attendance_date',
        'status',
        'updated_at',
        'created_at',
    ];
    // attendance table is in relationship with student table
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
