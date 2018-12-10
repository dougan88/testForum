<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Thread extends Model
{
    public function threadResponses()
    {
        return $this->hasMany('App\ThreadResponse');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}