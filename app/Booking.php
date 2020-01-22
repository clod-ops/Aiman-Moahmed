<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'user_id',
        'playground_id',
        'start_date_time',
        'finish_date_time',
       ];

    // public function scopeByUser($query, User $user){
    //     if(!$user->hasRole('Admin|User')){
    //         return $query->
    //     }
    // }
    // relationships
    public function user()
    {
        return $this->belongsTo('App\User');
    }

    public function playground()
    {
        return $this->belongsTo('App\Playground');
    }

    public function customer()
    {
        return $this->belongsTo('App\Customer');
    }
}
