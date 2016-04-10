<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Notification;
use App\Booking;
use App\User;
use Carbon\Carbon;
use Validator;
use Auth;

class BookingController extends Controller
{
    //
    public function checkBooking(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:50',
            'email' => 'required|email',
            'payment_id' => 'required',
            'package_id' => 'required',
            'phone_no' => 'required|digits:10',
        ]);
        
        //var_dump($validator->errors()->all()); die();
        
        if ($validator->fails())
            return 'false';
        else
            return 'true';
    }
    
    public function makeBooking(Request $request){
        //save data in DB
        $store = new Booking;
        $store->company_id  = Auth::user()->company_id;
        $store->name        = $request->name;
        $store->email       = $request->email;
        $store->payment_id  = $request->payment_id;
        $store->package_id  = $request->package_id;
        $store->phone_no    = $request->phone_no;
        $store->save();
        
        //make new notification in notification table
        $total = User::where('company_id', Auth::user()->company_id)->get();
        
        foreach( $total as $t ){
            $notification = new Notification;
            $notification->cid = $t->id;
            $notification->company_id = $t->company_id;
            $notification->email_of_booker = $request->email;
            $notification->notified_at = Carbon::now();
            $notification->status = 'unseen';
            $notification->save();
        }
    }
}
