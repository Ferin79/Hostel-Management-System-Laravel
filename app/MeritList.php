<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MeritList extends Model
{
    protected $fillable = ['user_id'];

    public  function Department()
    {
        return $this->belongsTo(Departments::class);
    }
}
