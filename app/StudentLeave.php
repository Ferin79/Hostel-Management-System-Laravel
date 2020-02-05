<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentLeave extends Model
{
    protected $guarded = [];
    protected  $fillable = ['user_id','isApproved','reason','duration','startfrom','contact'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
