<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Classes_Subject extends Model
{
    public $timestamps = false;
    protected $table = 'classes_subjects';

    function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    function class()
    {
        return $this->belongsTo(Osztaly::class);
    }
}
