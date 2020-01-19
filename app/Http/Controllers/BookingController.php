<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use App\Rules\StartDT;
use App\Rules\FinishDT;
use App\Playground;
use App\Booking;

class BookingController extends Controller
{
    public function index()
    {
        $bookings = Booking::paginate(10);

        return view('bookings.index', compact('bookings'));
    }


    public function create()
    {
        return view('bookings.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable',
            'playground_id' => 'required',
            'start_date_time' => ['required','date','after:today', new StartDT],
            'finish_date_time' => ['required','date','after:start_date_time', new FinishDT()],
        ]);
       
        $request->merge(['user_id' => Auth::user()->id]);
        
        Booking::create($request->all());

        return Redirect::to('bookings')
        ->with('success', 'Great! Booking created succesfully.');
    }

    
    public function show(Request $request)
    {
        //
    }

    
    public function edit($id)
    {
        $data['booking_info'] = Booking::where('id', $id)->first();
 
        return view('bookings.edit', $data);
    }

   
    public function update(Request $request, $id)
    {
            $request->validate([
            'user_id' => 'required',
            'playground_id' => 'required',
            'start_date_time' => ['required','date','after:today', new StartDT()],
            'finish_date_time' => ['required','date','after:start_date_time', new FinishDT()],
        ]);
         
        $update = ['user_id' => $request->user_id, 'playground_id' => $request->playground_id, 'start_date_time' => $request->start_date_time, 
        'finish_date_time' => $request->finish_date_time];
        Booking::where('id',$id)->update($update);
   
        return Redirect::to('bookings')
       ->with('success','Great! Booking updated successfully');
    }

    
    public function destroy($id)
    {
        Booking::where('id',$id)->delete();

        return Redirect::to('bookings')->with('success','Booking deleted successfully');
    }
}
