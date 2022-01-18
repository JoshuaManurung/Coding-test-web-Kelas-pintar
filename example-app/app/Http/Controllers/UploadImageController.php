<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ProfileModel;

class UploadImageController extends Controller
{   
    public function index(){
        return view('updateFoto');
    }

    public function store(Request $request){
        if($request->file('file')){
            $filename = $request->file('file')->getClientOriginalName();

            $filenames = pathinfo($filename, PATHINFO_FILENAME);

            $extension = $request->file('file')->getClientOriginalExtension();

            $filenameToStore = $filenames.'_'.time().'.'.$extension;

            $request->file('file')->move('public/image', $filenameToStore);
            
            $input = new ProfileModel;

            $input->file_name = $filenameToStore;
            $input->save();

            return redirect('/image-upload'); 
        }
        else{
            $filenameToStore = 'noimage.jpg';
            return redirect('/image-upload');
        }
    }
}
