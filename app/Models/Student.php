<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;
    // student table is in relationship with batch table
    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

}
