<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'user_id',
       ];

       public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function playground()
    {
        return $this->belongsTo('App\Playground');
    }

    public function booking()
    {
        return $this->belongsTo('App\Booking');
    }
}
