<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use DB;

class MicroController extends Controller
{
    public function detail($id)
    {
       $user_name = DB::table('users')->where('company_id', $id)->value('user_name');
        $packages = DB::table('packages')->where('company_id', $id)->get();
        return view('pages.microsite',compact('user_name','packages'));


    }
}
