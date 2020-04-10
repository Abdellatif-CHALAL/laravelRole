<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserImage extends Model
{
    //
    protected $guarded=[];

    public function users(){

        return $this->belongsTo(Users::class,'user_id');
    }
}
