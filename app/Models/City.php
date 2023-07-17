<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\Coach;
use App\Models\User;
use App\Models\ParentModel;
class City extends Model
{
    use HasFactory, SoftDeletes;
    public function coaches()
    {
        return $this->hasMany(Coach::class);
    }
    public function parent()
    {
        return $this->hasMany(ParentModel::class);
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
