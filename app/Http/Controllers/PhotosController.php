<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Galery;
use Validator;
use Auth;


class PhotosController extends Controller
{
     //save package
    public function save(Request $request){

        $store = new Galery;
        $store->company_id = Auth::user()->company_id;
        $store->pic= $request->user_name;
        $store->save();

    }




}


