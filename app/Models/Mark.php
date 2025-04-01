<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    public $timestamps = false;
    protected $table = 'marks';

    function student()
    {
        return $this->belongsTo(Student::class);
    }

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }
}

