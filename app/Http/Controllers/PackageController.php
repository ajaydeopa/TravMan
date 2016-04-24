<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Package;

class PackageController extends Controller
{
	public function save(Request $request){
		$store = new Package;
    	$store->pack_name = $request->package_name;
    	$store->pack_duration = $request->package_duration;
    	$store->pack_desc = $request->description;
    	$store->pack_include = $request->package_include;
    	$store->cost_include = $request->cost_include;
    	$store->notes = $request->notes;
    	$store->save();
    	return $request->package_name;
	}

}
