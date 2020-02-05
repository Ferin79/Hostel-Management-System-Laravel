<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SeatMatrix extends Model
{
    protected $fillable = ['institution_id','department_id','year','cast','boys_seat','girls_seat'];
}
