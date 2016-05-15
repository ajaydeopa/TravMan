<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Gallery;
use Validator;
use Auth;
use Intervention\Image\Facades\Image;


class PhotosController extends Controller
{
     //save photos
   	public function save(Request $request)
	{
        $image 			= 	$request->file('file');
        $resizedImage 	= 	$this->resize($image, '600');//set size for thumb

        if(!$resizedImage)
        {
        	return redirect()->back()->withError('Could not resize Image');
        }

    return view('pages.addphotos');
	}

	private function resize($image, $size)
    {
    	try
    	{
          $store = new Gallery;
       $destinationPath1= "/assets/images/gallery/pics/";
            $destinationPath2= "/assets/images/gallery/thumbs/";
    		$extension 		= 	$image->getClientOriginalExtension();
    		$imageRealPath 	= 	$image->getRealPath();
    		$thumbName 		= 	'thumb_'. $image->getClientOriginalName();
            $picName 		= 	'pic_'. $image->getClientOriginalName();

            $img = Image::make($imageRealPath); // use this if you want facade style code
	   $img->save(public_path().'/'.$destinationPath1. $picName);

            $img->resize(intval($size), null, function($constraint) {
	    		 $constraint->aspectRatio();
	    	});
	    	 $img->save(public_path().'/'.$destinationPath2. $thumbName);
    	 $store->company_id = Auth::user()->company_id;

           $store->thumb= $destinationPath2. $thumbName;
           $store->pic= $destinationPath1. $picName;


            $store->save();


        }
    	catch(Exception $e)
    	{
    		return false;
    	}

    }



}
