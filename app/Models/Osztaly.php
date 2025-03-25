<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Stringable;

class Osztaly extends Model
{
    public $timestamps = false;

    function classes_subject()
    {
        return $this->hasMany(Classes_Subject::class);
    }

    function student()
    {
        return $this->hasMany(Student::class);
    }
}