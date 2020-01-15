<?php

namespace App\Http\Controllers;

use App\Booking;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Redirect;
use PDF;
use App\Rules\StartDT;
use App\Rules\FinishDT;

class BookingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bookings = Booking::paginate(10);

        return view('bookings.index', compact('bookings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bookings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'nullable',
            'playground_id' => 'required',
            'start_date_time' => ['required','date', new StartDT],
            'finish_date_time' => ['required', new FinishDT],
        ]);
       
        $request->merge(['user_id' => Auth::user()->id]);
        
        Booking::create($request->all());

        return Redirect::to('bookings')
        ->with('success', 'Great! Booking created succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['booking_info'] = Booking::where('id', $id)->first();
 
        return view('bookings.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'user_id' => 'required',
            'playground_id' => 'required',
            'start_date_time' => 'required',
            'finish_date_time' => 'required',
        ]);
         
        $update = ['user_id' => $request->user_id, 'playground_id' => $request->playground_id, 'start_date_time' => $request->start_date_time, 
        'finish_date_time' => $request->finish_date_time];
        Booking::where('id',$id)->update($update);
   
        return Redirect::to('bookings')
       ->with('success','Great! Booking updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Booking::where('id',$id)->delete();

        return Redirect::to('bookings')->with('success','Booking deleted successfully');
    }
}
