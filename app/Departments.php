<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Departments extends Model
{
    protected $fillable = ['institution_id','department_name'];

    public function StudentEducation()
    {
        return $this->hasMany(StudentEducation::class);
    }
    public function Institution()
    {
        return $this->belongsTo(Institution::class);
    }
}
