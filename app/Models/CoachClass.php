<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\User;
use App\Models\CoachCourse;
class CoachClass extends Model
{
    use HasFactory, SoftDeletes;
    public function users()
    {
        return $this->belongsTo(User::class);
    }
    public function course()
    {
        return $this->belongsTo(CoachCourse::class);
    }
}
