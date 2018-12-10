<?php

namespace App;

use App\Listeners\ThreadCreating;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Thread extends Model
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'content',
        'user_id'
    ];

    protected $dispatchesEvents = [
        'creating' => ThreadCreating::class,
    ];

    public function threadResponses()
    {
        return $this->hasMany('App\ThreadResponse');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}