<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;
use App\Booking;
use App\Playground;

class FinishDT implements Rule
{
    public $id;
  
    public function __construct()
    {

    }
   
    public function passes($attribute, $value)
    {

        $date = Carbon::create($value);

        $bookingsCount = Booking::where(function ($query) use ($date) {
            $query->where(function ($query) use ($date) {
                $query->where('start_date_time', '<=', $date)
                        ->where('finish_date_time', '>', $date);
                });
        })->count();

        return $bookingsCount == 0;
    }

    public function message()
    {
        return 'Time not available/ Allocated';
    }
}
