<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Mark;

class Student extends Model
{
    public $timestamps = false;

    public function marks()
{
    return $this->hasMany(\App\Models\Mark::class);
}


    function class()
    {
        return $this->belongsTo(Osztaly::class);
    }
}

