<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ParentDetail extends Model
{
    protected $guarded = [];
    protected $fillable = ['user_id','guard_name','guard_email','guard_number'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
