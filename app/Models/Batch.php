<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;
    // batch table is in relationship with schedule table
    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }
}
