<?php

namespace App\Http\Controllers;

use App\Customer;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers = Customer::get();

        return view('customers.index', compact('customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('customers.create');
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
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'user_id' => 'required',
        ]);

        Customer::create($request->all());

        return Redirect::to('customers')
        ->with('success', 'Great! Customer created succesfully.');
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
        $where = array('id' => $id);
        $data['customer_info'] = Customer::where($where)->first();
 
        return view('customers.edit', $data);
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
            'first_name' => 'required',
            'last_name' => 'required',
            'date_of_birth' => 'required',
            'user_id' => 'required',
        ]);
         
        $update = ['first_name' => $request->first_name, 'last_name' => $request->last_name, 'date_of_birth' => $request->date_of_birth, 'user_id' => $request->user_id];
        Customer::where('id',$id)->update($update);
   
        return Redirect::to('customers')
       ->with('success','Great! Customer updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
        Customer::where('id',$id)->delete();
        
        return Redirect::to('customers')->with('success','Customer deleted successfully');
    }
}
