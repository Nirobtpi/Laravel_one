<?php

namespace App\Http\Controllers;

use App\Models\PhotoUpload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UploadPhotoController extends Controller
{
    function url(){
        return view('backend.file-upload');
    }
    function addPhoto(Request $request){
    //    return $request->file('photo_name');

        $data = $request->all();
        if ($request->file('photo_name')) {

            $data['photo_name'] = Storage::putFile('uploads', $request->file('photo_name')); 
           
        }
        PhotoUpload::create($data);

        return back()->with('success','success');
    }

    
    function viewPhoto(){
        $all=PhotoUpload::all();
        return view('backend.view-photo', compact('all'));
    }
}
