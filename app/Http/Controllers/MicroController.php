<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class MicroController extends Controller
{
    public function detail($id)
    {
       $user = DB::table('userdetails')->where('cid', $id)->first();
        $packages = DB::table('packages')->where('company_id', $id)->get();
        return view('pages.microsite',compact('user','packages'));


    }
}
