<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Booking;

class FinishDT implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        //Carbon::create($value) converts string(value) to integer(date)
        $date = Carbon::create($value);
                            $bookingsCount = Booking::where(function ($query) use ($date) {
                                $query->where(function ($query) use ($date) {
                                   $query->where('start_date_time', '<=', $date)
                                           ->where('finish_date_time', '>', $date);
                                   });
                               })->count();
                              

        // greater then today AND count of overlapping bookings = 0
        return $date >= Carbon::now() && $bookingsCount >! 0;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Should be bigger than start Date/Time';
    }
}
