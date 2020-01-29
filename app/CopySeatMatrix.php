<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CopySeatMatrix extends Model
{
    protected $fillable = ['institution_id','department_id','year','cast'];
}
