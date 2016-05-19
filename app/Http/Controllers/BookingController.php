<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Redirect;
use App\Http\Requests;
use App\Notification;
use App\Booking;
use App\Package;
use App\User;
use Carbon\Carbon;
use Validator;
use Auth;
use Mail;

class BookingController extends Controller
{
    //open booking page with pakage name
    public function show(){
        $package = Package::where('company_id', Auth::user()->company_id)->get();

        return view('pages.booking', compact('package'));
    }

    //validate booking form
    public function checkBooking(Request $request){
        $validator = Validator::make($request->all(), [
            'name'  => 'required|max:50',
            'email' => 'required|email',
            'payment_id' => 'required',
            'phone_no' => 'required|max:12|min:12',
            'no_of_adults' => 'required|integer',
            'departure_date' => 'required',
            'no_of_childrens' => 'required|integer'
        ]);

        if( $validator->errors()->has('name') )
            $d['name'] = $validator->errors()->first('name');
        else
        {   $d['name'] = 'no';

            if( $validator->errors()->has('email') )
                $d['email'] = $validator->errors()->first('email');
            else
            {   $d['email'] = 'no';

                if( $validator->errors()->has('phone_no') )
                    $d['phone_no'] = $validator->errors()->first('phone_no');
                else
                {   $d['phone_no'] = 'no';

                    if( $request->pack_id === 'default' )
                        $d['package_id'] = 'Enter a valid package name.';
                    else
                    {   $d['package_id'] = 'no';

                        if( $validator->errors()->has('departure_date') )
                            $d['departure_date'] = $validator->errors()->first('departure_date');
                        else
                        {   $d['departure_date'] = 'no';

                            if( $validator->errors()->has('no_of_adults') )
                                $d['no_of_adults'] = $validator->errors()->first('no_of_adults');
                            else
                            {   $d['no_of_adults'] = 'no';

                                if( $validator->errors()->has('no_of_childrens') )
                                    $d['no_of_childrens'] = $validator->errors()->first('no_of_childrens');
                                else
                                {   $d['no_of_childrens'] = 'no';

                                    if( $validator->errors()->has('payment_id') )
                                        $d['payment_id'] = $validator->errors()->first('payment_id');
                                    else
                                        $d['payment_id'] = 'no';
                                }
                            }
                        }
                    }
                }
            }
        }

        return $d;
    }
    
    //save booking details sfter validation
    public function makeBooking(Request $request){
        $id = $request->pack_id;

        $package = Package::find($id);

        $ddate = $request->departure_date;

        $year = substr($ddate, 6, 4);
        $month = substr($ddate, 3, 2);
        $day = substr($ddate, 0, 2);

        //save data in DB
        $store = new Booking;
        $store->company_id  = Auth::user()->company_id;
        $store->package_id  = $package->pack_name;
        $store->package_duration  = $package->pack_duration;
        $store->departure_date  = $year.'-'.$month.'-'.$day;
        $store->name = $request->name;
        $store->email = $request->email;
        $store->no_of_adults = $request->no_of_adults;
        $store->no_of_childrens = $request->no_of_childrens;
        $store->payment_id  = $request->payment_id;
        $store->phone_no    = $request->phone_no;
        $store->save();

        //make new notification in notification table
        $this->bookingNotification($request->email, 'booked');

        return $store->id;
        //mail to customer

    }

    public function sendmail(Request $request){
        $user = Booking::find($request->id);

            Mail::send('auth.emails.confirm', ['user' => $user], function ($m) use ($user) {

            $m->from('prashushitech@gmail.com', 'PrashushiTech');

            $m->to($user->email, $user->name)->subject('verify mail');

        });
    }

    //open page having list of all bookings
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

    //show detail of specific booking
    public function showbooking($id){
        $idd = floor((int)substr($id, 3) / 1000);
        $data = Booking::find($idd);
        return view('pages.bookingdetail', compact('data'));
    }

    //create notification of booked / cancelled booking.
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
