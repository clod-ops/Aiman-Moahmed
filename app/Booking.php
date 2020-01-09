<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'playground_id',
        'time',
       ];

    // relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function playground()
    {
        return $this->belongsTo('App\Playground');
    }
}
