<?php

namespace App\Http\Controllers;

use App\Playground;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
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
        $playgrounds = Playground::paginate(10);

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
            'name' => 'required|regex: /^[a-zA-Z\s]*$/',
            'location' => 'required|alpha',
            'size' => 'required|integer|between:1,9999',
            'capacity' => 'required|integer|between:1,999',
            'cover_image' => 'image|nullable|max:1999'
        ]);
        
        if($request->hasFile('cover_image')){
            // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store(Checks unique image using timestamp)
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        // Playground::create($request->all());

        $playground = new Playground;
        $playground->name = $request->input('name');
        $playground->location = $request->input('location');
        $playground->size = $request->input('size');
        $playground->capacity = $request->input('capacity');
        $playground->cover_image = $fileNameToStore;
        $playground->save();
        
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
            'name' => 'required|alpha',
            'location' => 'required|alpha',
            'size' => 'required|integer|between:1,9999',
            'capacity' => 'required|integer|between:1,999',
            'cover_image' => 'image|nullable|max:1999'
        ]);
         
        // $update = ['name' => $request->name, 'location' => $request->location, 'size' => $request->size, 'capacity' => $request->capacity, 'cover_image' => $request->cover_image];
        // Playground::where('id',$id)->update($update);

        if($request->hasFile('cover_image')){
            // Get filename with extension
            $filenameWithExt = $request->file('cover_image')->getClientOriginalName();
            // Filename
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // extension
            $extension = $request->file('cover_image')->getClientOriginalExtension();
            //filename to store(Checks unique image using timestamp)
            $fileNameToStore = $filename.'_'.time().'.'.$extension;
            //upload image
            $path = $request->file('cover_image')->storeAs('public/cover_images', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        }

        $playground = Playground::find($id);
        $playground->name = $request->input('name');
        $playground->location = $request->input('location');
        $playground->size = $request->input('size');
        $playground->capacity = $request->input('capacity');
        if($request->hasFile('cover_image')){
            $playground->cover_image = $fileNameToStore;
        }
        $playground->save();
   
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
