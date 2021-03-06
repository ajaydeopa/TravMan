<?php

namespace App\Http\Controllers;

use App\Feed;
use Illuminate\Http\Request;
use Requests;
use DB;
use Illuminate\Http\RedirectResponse;
use Redirect;
use View;
use Validator;

class MicroController extends Controller
{

    public function feedbacks(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:20',
            'email' => 'required|email',
            'message' => 'required|max:50'
                    ]);

        //var_dump($validator->errors()->all()); die();

        if( $validator->errors()->has('name') )
            $d['names'] = $validator->errors()->first('name');
        else
        {   $d['names'] = 'no';


                if( $validator->errors()->has('email') )
                    $d['emails'] = $validator->errors()->first('email');
                else
                {   $d['emails'] = 'no';

                    if( $validator->errors()->has('message') )
                        $d['messages'] = $validator->errors()->first('message');
                    else
                    {   $d['messages'] = 'no';

                    }
                }
            }


        return $d;

    }

    public function storeFeed(Request $request){
		$store = new Feed;
        $store->company_id = '1';
    	$store->name = $request->name;
    	$store->email = $request->email;
    	$store->message = $request->message;
    	$store->save();
    	return $request->name;
	}
    public function detail($id)
    {
        $user = DB::table('userdetails')->where('company_id', $id)->first();
        $name = DB::table('userdetails')->where('company_id', $id)->first()->full_name;
        $galery = DB::table('galleries')->where('company_id', $id)->take(12)->get();
        $packages = DB::table('packages')->where('company_id', $id)->take(2)->get();


        return view('pages.microsite',compact('user','packages','galery','name'));

    }
    public function more($id)
    {   $name = DB::table('userdetails')->where('company_id', $id)->first()->company_name;

                $packages = DB::table('packages')->where('company_id', $id)->get();
        return view('pages.morepackage',compact('packages','name'));


    }
    public function galery($id)

    {   $name = DB::table('userdetails')->where('company_id', $id)->first()->company_name;


        $galery = DB::table('galleries')->where('company_id', $id)->get();
        return view('pages.galery',compact('galery','name'));


    }
public function package($id)
    {

        $n = DB::table('packages')->where('id', $id)->first()->company_id;
        $name = DB::table('userdetails')->where('company_id', $n)->first()->full_name;
        $packages = DB::table('packages')->where('id', $id)->first();
        return view('pages.packagedetails',compact('packages','name'));


    }
}
