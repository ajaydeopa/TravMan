<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;
use App\Http\Requests;
use App\DayItenary;
use App\Package;
use Validator;
use Auth;

class PackageController extends Controller
{   //validate package form
    public function validatePackage(Request $request){
        $validator = Validator::make($request->all(), [
            'package_name'  => 'required|max:20',
            'days' => 'required|integer',
            'nights' => 'required|integer',
            'description' => 'required|max:100',
            'package_include' => 'required|max:50',
            'cost_include' => 'required|max:50',
            'notes' => 'required|max:50'
        ]);

        //var_dump($validator->errors()->all()); die();

        if( $validator->errors()->has('package_name') )
            $d['name'] = $validator->errors()->first('package_name');
        else
        {   $d['name'] = 'no';

            if( $validator->errors()->has('days') )
                $d['duration'] = $validator->errors()->first('days');
            else if( $validator->errors()->has('nights') )
                $d['duration'] = $validator->errors()->first('nights');
            else
            {   $d['duration'] = 'no';

                if( $validator->errors()->has('description') )
                    $d['description'] = $validator->errors()->first('description');
                else
                {   $d['description'] = 'no';

                    if( $validator->errors()->has('package_include') )
                        $d['package_include'] = $validator->errors()->first('package_include');
                    else
                    {   $d['package_include'] = 'no';

                        if( $validator->errors()->has('cost_include') )
                            $d['cost_include'] = $validator->errors()->first('cost_include');
                        else
                        {   $d['cost_include'] = 'no';

                            if( $validator->errors()->has('notes') )
                                $d['notes'] = $validator->errors()->first('notes');
                            else
                                $d['notes'] = 'no';
                        }
                    }
                }
            }
        }

        return $d;
    }

    //save package
    public function save(Request $request){
		$store = new Package;
        $store->company_id = Auth::user()->company_id;

    	$store->pack_name = $request->package_name;
    	$store->pack_duration = $request->days.' days / '. $request->nights .' nights';
    	$store->pack_desc = $request->description;
    	$store->pack_include = $request->package_include;
    	$store->cost_include = $request->cost_include;
    	$store->notes = $request->notes;
     $image = $request->file('file');
          $destinationPath1= "/assets/images/packages/pics/";
            $destinationPath2= "/assets/images/packages/thumbs/";
    		$extension 		= 	$image->getClientOriginalExtension();
    		$imageRealPath 	= 	$image->getRealPath();
    		$thumbName 		= 	'thumb_'. $image->getClientOriginalName();
            $picName 		= 	'pic_'. $image->getClientOriginalName();
	    	     	$size='150';
          $str=str_random('4');
            $img = Image::make($imageRealPath); // use this if you want facade style code
	   $img->save(public_path().'/'.$destinationPath1.$str.$picName);

            $img->resize(intval($size), null, function($constraint) {
	    		 $constraint->aspectRatio();
	    	});
	    	 $img->save(public_path().'/'.$destinationPath2.$str.$thumbName);
    	 $store->company_id = Auth::user()->company_id;

           $store->thumb= $destinationPath2.$str.$thumbName;
           $store->pic= $destinationPath1.$str.$picName;


         	$store->save();

        $day = new DayItenary;
        $day->pack_id = $store->id;
        $day->day_no = 'Day 1';
        $day->save();

    	return $request->package_name;
	}

    //get duration of package on selecting a package
    public function getduration(Request $request){
        $id = $request->id;

        $data = Package::find($id);
        return $data->pack_duration;
    }

    //show all packages
    public function showPackage(){
        $data = Package::where('company_id', Auth::user()->company_id)->get();

        return view('pages.allpackages', compact('data'));
    }

    //delete package
    public function deletePackage(Request $request){
        $id = $request->id;

        Package::find($id)->delete();

        $data = Package::where('company_id', Auth::user()->company_id)->get();

        return $data;
    }
}
