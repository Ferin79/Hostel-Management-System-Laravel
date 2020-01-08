<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentProfile extends Model
{
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function StudentEducation()
    {
        return $this->hasOne(StudentEducation::class);
    }
}
