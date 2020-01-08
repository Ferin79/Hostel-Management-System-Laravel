<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    protected $guarded = [];
    public function StudentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
