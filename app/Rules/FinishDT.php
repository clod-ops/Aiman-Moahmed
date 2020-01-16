<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;
use App\Booking;
use App\Playground;

class FinishDT implements Rule
{
    public $id;
  
    public function __construct($id)
    {
        $this->id = $id;
    }
   
    public function passes($attribute, $value)
    {
        //Checks for overlaps
        $date = Carbon::create($value);

        $bookingsCount = Booking::where(function ($query) use ($date) {
            $query->where(function ($query) use ($date) {
                $query->where('start_date_time', '<=', $date)
                        ->where('finish_date_time', '>', $date);
                });
        })->count();

        //Count of overlapping bookings == 0
        return $date === $this->id && $bookingsCount == 0;
    }

    public function message()
    {
        return 'Time not available/ Allocated';
    }
}
