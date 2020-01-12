<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playground extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name',
        'location',
        'size',
        'capacity',
       ];

       public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
