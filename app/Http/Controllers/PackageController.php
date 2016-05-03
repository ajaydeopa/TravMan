<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Package;
use Validator;
use Auth;

class PackageController extends Controller
{   public function validatePackage(Request $request){
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

    public function save(Request $request){
		$store = new Package;
        $store->company_id = Auth::user()->company_id;
    	$store->pack_name = $request->package_name;
    	$store->pack_duration = $request->days.' days / '. $request->nights .' nights';
    	$store->pack_desc = $request->description;
    	$store->pack_include = $request->package_include;
    	$store->cost_include = $request->cost_include;
    	$store->notes = $request->notes;
    	$store->save();
    	return $request->package_name;
	}

    public function getduration(Request $request){
        $id = $request->id;

        $data = Package::find($id);
        return $data->pack_duration;
    }
}
