<?php

namespace App\Http\Controllers;

use App\Playground;
use Illuminate\Http\Request;
use Redirect;
use PDF;

class PlaygroundController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playgrounds = Playground::paginate(5);

        return view('playgrounds.index', compact('playgrounds'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('playgrounds.create');
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
            'name' => 'required',
            'location' => 'required',
            'size' => 'required',
            'capacity' => 'required',
        ]);

        Playground::create($request->all());

        return Redirect::to('playgrounds')
        ->with('success', 'Great! Playground created succesfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
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
        $data['playground_info'] = Playground::where($where)->first();
        
        return view('playgrounds.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'location' => 'required',
            'size' => 'required',
            'capacity' => 'required',
        ]);
         
        $update = ['name' => $request->name, 'location' => $request->location, 'size' => $request->size, 'capacity' => $request->capacity];
        Playground::where('id',$id)->update($update);
   
        return Redirect::to('playgrounds')
       ->with('success','Great! Playground updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Playground::where('id',$id)->delete();
   
        return Redirect::to('playgrounds')->with('success','Playground deleted successfully');
    }
}
