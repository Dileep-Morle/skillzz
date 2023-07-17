<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use App\Models\City;
class ParentModel extends Model
{
    use HasFactory, SoftDeletes;
    
    public function city(){
        $this->belongsTo(City::class);
    }
}
