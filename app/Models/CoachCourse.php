<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\CoachBatch;
class CoachCourse extends Model
{
    use HasFactory, SoftDeletes;
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function batches()
    {
        return $this->hasOne(CoachBatch::class);
    }
    
}
