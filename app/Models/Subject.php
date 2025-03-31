<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    public $timestamps = false;

    function classes_subject()
    {
        return $this->hasMany(Classes_Subject::class);
    }

    function mark()
    {
        return $this->hasMany(Mark::class);
    }

}

