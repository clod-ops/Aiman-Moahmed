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
}
