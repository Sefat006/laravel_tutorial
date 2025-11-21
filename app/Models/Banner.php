<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    public function creatorInfo(){
        return $this->belongsTo('App\Models\User', 'ban_creator', 'id');
    }
}
