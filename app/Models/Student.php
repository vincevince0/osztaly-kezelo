<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    public $timestamps = false;

    function mark()
    {
        return $this->hasMany(Mark::class);
    }

    function class()
    {
        return $this->belongsTo(Osztaly::class);
    }
}

