<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{

    protected $fillable = [
        'student_id',
        'subject_id',
        'mark',
        'date',
        'logo',
    ];

    public $timestamps = false;

    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function subject()
    {
        return $this->belongsTo(Subject::class);
    }

    // Optional: alias 'mark' as 'grade' for nicer display in Blade
    public function getGradeAttribute()
    {
        return $this->mark;
    }
    
}

