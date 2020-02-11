<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AllotedSeats extends Model
{
    protected $fillable = ['merit_list_id'];

    public  function MeritList()
    {
        return $this->belongsTo(MeritList::class);
    }
}
