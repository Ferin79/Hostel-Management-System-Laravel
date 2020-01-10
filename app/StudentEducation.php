<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEducation extends Model
{
    protected $fillable = ["student_id", "department_id", "in_ssc_hsc", "percentage", "in_college", "cgpa", "current_sem"];

    public function StudentProfile()
    {
        return $this->belongsTo(StudentProfile::class);
    }
}
