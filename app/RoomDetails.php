<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RoomDetails extends Model
{
    protected $fillable = ['room_type','price','image1',
        'image2','is_ac','is_guest','department_id','room_number','capacity','institution_id','term','gender'];

    public function institution()
    {
        return $this->belongsTo(Institution::class);
    }
    
    public function department()
    {
        return $this->belongsTo(Departments::class);
    }

}
