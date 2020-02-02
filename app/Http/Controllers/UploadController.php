<?php

namespace App\Http\Controllers;

use App\CoverImage;
use App\Playground;
use App\PlaygroundPhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

// class UploadController extends Controller
// {
//     public function uploadForm()
//     {
//         return view('upload_form');
//     }

//     public function uploadSubmit(Request $request)
//     {
//         $photos = [];
//         foreach ($request->photos as $photo) {
//         $filename = $photo->store('photos');
//         $playground_photo = PlaygroundPhoto::create([
//             'filename' => $filename
//         ]);

//         $photo_object = new \stdClass();
//         $photo_object->name = str_replace('photos/', '',$photo->getClientOriginalName());
//         $photo_object->size = round(Storage::size($filename) / 1024, 2);
//         $photo_object->fileID = $playground_photo->id;
//         $photos[] = $photo_object;
//     }

//     return response()->json(array('files' => $playground_photo), 200);
//     }

//     public function postPlayground(Request $request)
//     {
//         $playground = Playground::create($request->all());
//         PlaygroundPhoto::whereIn('id', explode(",", $request->file_ids))
//         ->update(['photo_id' => $playground->id]);
//     return 'Playground saved successfully';
    }
}
