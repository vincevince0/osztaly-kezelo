<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Osztaly extends Model
{
    public $timestamps = false;
    protected $table = 'classes'; // Updated table name

    function classes_subject()
    {
        return $this->hasMany(Classes_Subject::class);
    }

    function student()
    {
        return $this->hasMany(Student::class);
    }
}
