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
            'no_of_adults' => 'required',
            'no_of_childrens' => 'required'
        ]);
        
        //var_dump($validator->errors()->all()); die();
        
        if( $validator->errors()->has('name') )
            $d['name'] = $validator->errors()->first('name');
        else
            $d['name'] = 'no';

        if( $validator->errors()->has('email') )
            $d['email'] = $validator->errors()->first('email');
        else
            $d['email'] = 'no';

        if( $validator->errors()->has('payment_id') )
            $d['payment_id'] = $validator->errors()->first('payment_id');
        else
            $d['payment_id'] = 'no';

        if( $validator->errors()->has('package_id') )
            $d['package_id'] = $validator->errors()->first('package_id');
        else
            $d['package_id'] = 'no';

        if( $validator->errors()->has('phone_no') )
            $d['phone_no'] = $validator->errors()->first('phone_no');
        else
            $d['phone_no'] = 'no';

        if( $validator->errors()->has('no_of_adults') )
            $d['no_of_adults'] = $validator->errors()->first('no_of_adults');
        else
            $d['no_of_adults'] = 'no';

        if( $validator->errors()->has('no_of_childrens') )
            $d['no_of_childrens'] = $validator->errors()->first('no_of_childrens');
        else
            $d['no_of_childrens'] = 'no';

        return $d;
    }
    
    public function makeBooking(Request $request){
        //save data in DB
        $store = new Booking;
        $store->company_id  = Auth::user()->company_id;
        $store->package_id  = $request->package_id;
        $store->package_duration  = $request->package_duration;
        $store->departure_date  = $request->departure_date;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->no_of_adults = $request->no_of_adults;
        $store->no_of_childrens = $request->no_of_childrens;
        $store->payment_id  = $request->payment_id;
        $store->phone_no    = $request->phone_no;
        $store->save();
        
        //make new notification in notification table
        $this->bookingNotification($request->email, 'booked');
    }

    public function allbookings(){
        $data = Booking::where('company_id', Auth::user()->company_id)->get();
        //return $data;
        return view('pages.allbookings', compact('data'));
    }

    //cancel booking
    public function cancel(Request $request){
        $id = $request->id;

        $this->bookingNotification(Booking::find($id)['email'], 'cancelled');
        Booking::find($id)->delete();
        $data = Booking::where('company_id', Auth::user()->company_id)->get();

        return $data;
    }

    //show detail of a booking
    public function showbooking($id){
        $idd = floor((int)substr($id, 3) / 1000);
        $data = Booking::find($idd);
        return view('pages.bookingdetail', compact('data'));
    }

    public function bookingNotification($email, $status){
        $total = User::where('company_id', Auth::user()->company_id)->get();
        
        foreach( $total as $t ){
            $notification = new Notification;
            $notification->cid = $t->id;
            $notification->company_id = $t->company_id;
            $notification->email_of_booker = $email;
            $notification->notified_at = Carbon::now();
            $notification->seen_status = 'unseen';
            $notification->booking_status = $status;
            $notification->save();
        }
    }
}
