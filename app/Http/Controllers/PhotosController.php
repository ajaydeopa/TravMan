<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Gallery;
use Validator;
use Auth;


class PhotosController extends Controller
{
     //save photos
    public function save(Request $request){

        $store = new Gallery;
        $store->company_id = Auth::user()->company_id;

        $destinationPath= "/assets/images/gallery/pics";
        $extension = $request->file->getClientOriginalExtension();
        $str = str_random(4);
        $filename = Auth::user()->company_id.$str.".{$extension}";
        //$size = $file->getSize();
        $upload_success = $request->file->move(public_path().'/'.$destinationPath, $filename);
        $url=$destinationPath.'/'. $filename;
        $store->pic= $url;
        $store->save();

         return view('pages.addphotos');

    }




}


