<?php

namespace App;

use App\Events\ThreadResponseCreated;
use Illuminate\Database\Eloquent\Model;

class ThreadResponse extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'content',
        'user_id',
        'thread_id',
    ];

    protected $dispatchesEvents = [
        'created' => ThreadResponseCreated::class,
    ];

    public function thread()
    {
        return $this->belongsTo('App\Thread');
    }

    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
