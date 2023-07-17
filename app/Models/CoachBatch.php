<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\CoachCourse;
use App\Models\User;
class CoachBatch extends Model
{
    use HasFactory, SoftDeletes;
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function courses()
    {
        return $this->belongsTo(CoachCourse::class);
    }
}
