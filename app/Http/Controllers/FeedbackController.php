<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Feedback;
use Validator;
use Carbon\Carbon;
use Auth;

class FeedbackController extends Controller
{
    //open feedback page
    public function show(){
    	$data = Feedback::all();

    	return view('pages.feedback', compact('data'));
    }

    //validate feedback form
    public function validatefeedback(Request $request){
    	$validator = Validator::make($request->all(), [
            'feedback'  => 'required|max:100',
            'email' => 'required|email',
        ]);

        if( $validator->errors()->has('email') )
            $d['email'] = $validator->errors()->first('email');
        else
        {   $d['email'] = 'no';

            if( $validator->errors()->has('feedback') )
                $d['feedback'] = $validator->errors()->first('feedback');
            else
                $d['feedback'] = 'no';
        }

        return $d;
    }

    //save feedback
    public function savefeedback(Request $request){
    	$store = new Feedback;
    	$store->cid = Auth::user()->id;
    	$store->email = $request->email;
    	$store->feedback = $request->feedback;
    	$store->at = Carbon::now();
    	$store->save();

    	return Feedback::all()->count();
    }

    public function savefeed(Request $request){
    	$store = new Feedback;
    	$store->cid = Auth::user()->id;
    	$store->email = Auth::user()->email;
    	$store->feedback = $request->feedback;
    	$store->at = Carbon::now();
    	$store->save();
    }
}
